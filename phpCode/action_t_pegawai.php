<?php
require_once('../phpCode/queryCode.php');

if (array_key_exists("action",$_GET)){
	$action = $_GET['action'];
	$date = date('Y-m-d H:i:s');
	isset($id);
	isset($nama_lengkap);
	isset($jenis_kelamin);
	isset($alamat);
	isset($email);
	$created_at = $date;
	$updated_at = $date;
	if (array_key_exists("id",$_POST)) $id = $_POST['id'];
	if (array_key_exists("nama_lengkap",$_POST)) $nama_lengkap = $_POST['nama_lengkap'];
	if (array_key_exists("jenis_kelamin",$_POST)) $jenis_kelamin = $_POST['jenis_kelamin'];
	if (array_key_exists("alamat",$_POST)) $alamat = $_POST['alamat'];
	if (array_key_exists("email",$_POST)) $email = $_POST['email'];
	$c = new Connection;
	switch ($action) {
		case 'update':
				/*
				action for updating data
				aksi untuk mengubah data
				*/
				$data = array(
					"id" => $id,
					"nama_lengkap" => $nama_lengkap,
					"jenis_kelamin" => $jenis_kelamin,
					"alamat" => $alamat,
					"email" => $email,
					"updated_at" => $updated_at
					);
				$c->update($data);
			break;
		case 'delete':
				/*
				action for deleting data
				aksi untuk menghapus data
				*/
				$c->delete($id);
			break;
		case 'add':
				/*
				action for adding data
				aksi untuk menambah data
				*/
				$data = array(
					"nama_lengkap" => $nama_lengkap,
					"jenis_kelamin" => $jenis_kelamin,
					"alamat" => $alamat,
					"email" => $email,
					"created_at" => $created_at,
					"updated_at" => $updated_at
					);		
				$c->insert($data);
			break;
		default:
			echo "Modul tidak diketahui";
			break;
	}
}
header("Location: ../index.php");
die();
?>