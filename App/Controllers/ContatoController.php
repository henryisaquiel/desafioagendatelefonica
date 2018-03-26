<?php
namespace App\Controllers;

use \App\Controllers\BaseController;

/**
* 
*/
class ContatoController extends BaseController
{

	protected $contatoModel;

	public function __construct()
	{
		parent::__construct();
		$this->contatoModel = new \App\Models\Contato;
	}

	public function getListaContatos()
	{
		$lista = $this->contatoModel->all();
		return $this->jsonReturn($lista);
	} 

	public function get($data){
		$id = array_shift($data);
		$contato = $this->contatoModel->find($id);
		return $this->jsonReturn(array_merge(['success' => true], ['data' => $contato]));
	}

	public function update($data)
	{
		$input = $this->postRequest();
		$contato = $this->contatoModel->update(array_shift($data), $input);

		return $this->jsonReturn(array_merge(['success' => true]));
	}

	public function delete($data)
	{
		$this->contatoModel->delete(array_shift($data));
		return $this->jsonReturn(array_merge(['success' => true]));
	}

	public function create($get)
	{
		$input = $this->postRequest();
		$contato = $this->contatoModel->create($input);
		return $this->jsonReturn(array_merge(['success' => true], ['data' => $contato]));
	}
}