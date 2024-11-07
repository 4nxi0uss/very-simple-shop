<?php

namespace App\Classes;

use Exception;
use PDO;
use PDOException;

class ProductsModel
{
    private $db;

    public function __construct($database)
    {
        $this->db = $database;
    }

    /**
     * Add a new product to the database
     * 
     * @param array $productData Array containing product information
     * @return bool|int Returns the last insert ID on success, false on failure
     * @throws Exception If required fields are missing
     */
    public function addProduct(array $productData): bool|int
    {
        // Required fields validation
        $requiredFields = ['name', 'price', 'sku'];
        foreach ($requiredFields as $field) {
            if (!isset($productData[$field])) {
                throw new Exception("Missing required field: {$field}");
            }
        }

        try {
            // Prepare the SQL statement
            $sql = "INSERT INTO products (
                        name, 
                        price, 
                        sku,
                        size,
                        weight,
                        dimensions
                    ) VALUES (
                        :name,
                        :price,
                        :sku,
                       :size,
                       :weight,
                       :dimensions
                    )";

            // INSERT INTO `products` (`id`, `sku`, `name`, `price`, `size`, `weight`, `dimensions`) VALUES (NULL, 'qwe', 'ewq', '12', '12', NULL, NULL);

            // Prepare and execute the statement
            $stmt = $this->db->prepare($sql);

            // var_dump($productData);

            $stmt->bindParam(':name', $productData['name'], PDO::PARAM_STR);
            $stmt->bindParam(':price', $productData['price'], PDO::PARAM_INT,);
            $stmt->bindParam(':sku', $productData['sku'], PDO::PARAM_STR);
            $stmt->bindParam(':size', $productData['size'], PDO::PARAM_INT);
            $stmt->bindParam(':weight', $productData['weight'], PDO::PARAM_INT);
            $stmt->bindParam(':dimensions', $productData['dimensions'], PDO::PARAM_STR);

            $stmt->execute();

            // Return the ID of the newly inserted product
            return $this->db->lastInsertId();
        } catch (PDOException $e) {
            // Log the error (implement your logging mechanism)
            error_log("Error adding product: " . $e->getMessage());

            return false;
        }
    }

    /**
     * Get products from the database with optional filtering and pagination
     * 
     * @return array Returns array of products and total count
     */
    public function getProducts(): array
    {
        try {
            // Start building the base query
            $sql = "SELECT * FROM products";

            $params = [];

            // Execute the final query
            $stmt = $this->db->prepare($sql);
            $stmt->execute($params);
            $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Return both the products and the total count
            return [
                'products' => $products,
            ];
        } catch (PDOException $e) {
            error_log("Error fetching products: " . $e->getMessage());
            return [
                'products' => [],
            ];
        }
    }

    /**
     * Delete products from the database
     * 
     * @return array Returns array with success status and affected rows count
     */
    public function deleteProducts($productIds): array
    {
        try {
            // Start transaction
            $this->db->beginTransaction();

            // Validate that we have valid IDs
            if (empty($productIds)) {
                throw new Exception("No product IDs provided for deletion");
            }

            // Proceed with hard delete
            $sql = "DELETE FROM `products` WHERE `products`.`id` = $productIds;";

            // Execute the delete query
            $stmt = $this->db->prepare($sql);
            $stmt->execute();

            // Get number of affected rows
            $affectedRows = $stmt->rowCount();

            // Commit transaction
            $this->db->commit();

            return [
                'success' => true,
                'affected_rows' => $affectedRows,
                'message' => "Successfully deleted $affectedRows product(s)"
            ];
        } catch (Exception $e) {
            // Rollback transaction on error
            $this->db->rollBack();

            error_log("Error deleting products: " . $e->getMessage());

            return [
                'success' => false,
                'affected_rows' => 0,
                'message' => "Error deleting products: " . $e->getMessage()
            ];
        }
    }
}
