<?php
namespace Image {
    class Transform {
        public static function Resize($sourceImage, $size, $direction = "height", $quality = -1) {
            $sourceWidth = imagesx($sourceImage);
            $sourceHeight = imagesy($sourceImage);
        
            // Calculate the new dimensions based on the specified direction
            if ($direction === "width") {
                $newWidth = $size;
                $newHeight = ($size / $sourceWidth) * $sourceHeight;
            } elseif ($direction === "height") {
                $newHeight = $size;
                $newWidth = ($size / $sourceHeight) * $sourceWidth;
            } else {
                return false; // Invalid direction
            }
        
            // Create a new image with the desired dimensions
            $destinationImage = imagecreatetruecolor($newWidth, $newHeight);
        
            // Resize the image
            imagecopyresampled($destinationImage, $sourceImage, 0, 0, 0, 0, $newWidth, $newHeight, $sourceWidth, $sourceHeight);
        
            // Clean up the source image
            imagedestroy($sourceImage);
        
            // Return the resized image as a variable
            ob_start();
            imagejpeg($destinationImage, null, $quality); // Change format if needed (e.g., imagepng for PNG)
            $resizedImage = ob_get_contents();
            ob_end_clean();
        
            // Clean up the destination image
            imagedestroy($destinationImage);
        
            return $resizedImage;
        }
    }
}