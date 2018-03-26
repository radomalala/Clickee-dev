<?php
namespace App\Interfaces;

interface CustomerRepositoryInterface
{
	public function create($input);

	public function getById($id);

	public function update($id,$input);

	public function deleteById($id);

	public function save($input);

	public function getAll();
}