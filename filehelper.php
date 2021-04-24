<?php
	/****************************************************************************
	 * This file contains functions that you can use to do the following:
	 * 1) print out the content of a variable (works with strings, numbers, arrays, etc.)
	 * 2) upload a file
	 * 3) delete a file
	 * 4) determine if an uploaded file is a picture
	 * 5) determine if an uploaded file is a pdf
	 * 6) check to see if any files were uploaded
	 * 7) strip the text from a pdf file
	 *
	 * Created by: Andrew Goldberg
	 *****************************************************************************/

	/**
	 * 1) FOR DEBUGGING: Given a variable and optionally a display title, will print out the contents of the variable in an easy to see format.
	 */
	function pretty_print($var, $title=null) {
		echo "\n<br>==================={$title}=====================\n<br>";
		var_dump($var);
		echo "\n<br>=======================================================\n<br>";
	}

	/**
	 * 2) Given an uploaded file, a target folder, and a new filename (optional), uploads the file and returns the filepath (the folder + the filename) to the new file
	 */
	function uploadFile($file, $target_folder, $new_filename=null){
		// check for errors
		$errorInfo = checkFileForErrors($file);
		if ($errorInfo['code'] > 0){
			echo $errorInfo['message'];
		}

		// set filename
		if ($new_filename){
			$filename = preventDuplicateFilename($target_folder, $new_filename);
		} else {
			$filename = preventDuplicateFilename($target_folder, $file['name']);
		}

		// add a slash to the end of the target folder if necessary
		if (substr($target_folder, -1) !== '/'){
			$target_folder .= '/';
		}

		$filepath = $target_folder . $filename;
		if ((move_uploaded_file($file['tmp_name'], $filepath))){
			return $filepath;
		} else {
			echo "There was a problem uploading your file. The file you tried to upload has the path: {$filepath}";
			return false;
		}
	}

	/**
	 * 3) Given a filepath, removes the file if it exists.
	 */
	function removeFile($filepath) {
		if (file_exists($filepath)){
			if (unlink($filepath)){
				return true;
			} else {
				return null;
			}
		} else {
			return false;
		}
	}

	/**
	 * 4) Given a filepath, checks to see if it is a picture.
	 */
	function isPicture($filepath) {
		$response = array('code' => 1);
		$pictureTypes =  array("image/gif", "image/jpeg", "image/jpg", "image/png");
		$fileType = getFileType($filepath);
		if (in_array($fileType, $pictureTypes)) {
			$response['code'] = 0;
		} else {
			$response['message'] = "* Error: Must upload gif, jpg, jpeg, and png\nYou uploaded a file with type: " . $fileType;
		}

		return $response;
	}

	/**
	 * 5) Given a filepath, checks to see if it is a pdf.
	 */
	function isPDF($filepath) {
		$response = array('code' => 1);
		$pdfTypes =  array("application/pdf");
		$fileType = getFileType($filepath);
		if (in_array($fileType, $pdfTypes)) {
			$response['code'] = 0;
		} else {
			$response['message'] = "* Error: Must upload pdf\nYou uploaded a file with type: " . $fileType;
		}
		return $response;
	}

	/**
	 * 6) Checks to see if any files were uploaded.
	 * Returns true or false
	 */
	function were_files_uploaded(){
		if (empty($_FILES)){
			return false;
		} else {
			foreach ($_FILES as $key => $file) {
				if ($file['error'] !== 4){
					return true;
				}
			}
		}
		return false;
	}

	/****************************************************************************
	 * NOTE: YOU MUST EMAIL Tony Zhang at tonyzhang@rhsmith.umd.edu to have him
	 * install the program "pdftotext" on the server before you can use this function
	 *****************************************************************************/
	/**
	 * 7) Given the full filepath to a pdf file, returns the text content of the pdf in a string.
	 */
	function pdfToText($filepath) {
		$content = exec("/usr/local/bin/pdftotext {$filepath} -", $array);
		foreach ($array as $line) {
			$content .= strtolower($line);
		}
		return $content;
	}






	/***********************************************************************************
	 * Below this line are just helper functions for the functions used above. You will
	 * most likely not need to use these or look at these.
	 ***********************************************************************************/











	/**
	 * Given a directory and a filename, if the file exists in that directory, then returns a new filename that does not already exist
	 * If the file does not exist, then it returns the same filename.
	 */
	function preventDuplicateFilename($dir, $filename) {
		$counter = 1;
		if (file_exists($dir . $filename)) {
			while (file_exists($dir . "($counter)" . $filename)){
				$counter ++;
			}
			$filename = "($counter)" .$filename;
		}
		return $filename;
	}

	/**
	 * Gets the extension of the file (.pdf, .jpg, etc.). You must provide the full path to the file.
	 */
	function getExtension($filename) {
		$temp = explode(".", $filename);
		$extension = end($temp);
		return $extension;
	}

	/**
	 * Returns the actual MIME type of the file (application/pdf, image/jpeg, etc.)  You must provide the full path to the file.
	 */
	function getFileType($filename){
		$finfo = finfo_open(FILEINFO_MIME_TYPE); // return mime type ala mimetype extension
		$fileType = finfo_file($finfo, $filename);
		finfo_close($finfo);
		return $fileType;
	}

	/**
	 * Given an uploaded file, checks to see if there are any errors with the upload.
	 */
	function checkFileForErrors($file){
		$response = array();
		if ($file["error"] > 0) {
			if ($file['error'] === 1) {
				$response['message'] = "Your file was too large. It has a size of:" . $file['size'] . " .";
			} else if ($file["error"] === 4) {
				$response['message'] = "Please select a file to upload";
			} else {
				$response['message'] = "Your file failed to upload with error number {$file['error']}. Try googling \"php file upload error {$file['error']}\"";
			}
			$response['code'] = $file['error'];
		} else {
			$response['code'] = 0;
		}
		return $response;
	}

?>