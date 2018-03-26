<?php
namespace App\Models;

/**
* 
*/
class BaseModel
{

	private $data;
	private $file_instance;
	private $file_name = 'data.json';

	function __construct(){
		$init_data = [
			'increment_next' => 0,
			'data' => [],
		];

		if(!file_exists($this->file_name)) {
			file_put_contents( $this->file_name, json_encode());
		}
		$file_data = file_get_contents( $this->file_name );
		$this->data = $file_data ? json_decode( $file_data, true) : $init_data;
	}

	public function updateFile()
	{
		file_put_contents($this->file_name, json_encode($this->data) );
	}

	private function insert($data)
	{
		array_push($this->data['data'], $data);
		$this->updateFile();
		return $data;

	}

	public function create($data)
	{
		$data = array_merge([
			'id' => $this->next()
		], $data);
		return $this->insert($data);
	}

	public function next()
	{
		$this->data['increment_next'] = $this->data['increment_next'] + 1;
		return $this->data['increment_next'];
	}

	public function getById($id)
	{
		return array_filter($this->data['data'], function ($v) use ($id) {
			return $v['id'] === intval($id);
		});
	}

	public function update($id, $data)
	{
		$find = $this->getById($id);
		if(empty($find)){
			return 0;
		}

		$all_data = $this->data['data'];
		$old = $all_data[key($find)];
		$all_data[key($find)] = array_merge($old, $data);

		$this->data['data'] = array_values($all_data);
		$this->updateFile();

		return count($find);
	}

	public function delete($id)
	{
		$find = $this->getById($id);
		
		$this->data['data'] = array_filter($this->data['data'], function ($v) use ($id) {
			return $v['id'] <> intval($id);
		});

		$this->updateFile();
		return count($find);
	}

	public function all()
	{
		return $this->data['data'];
	}

	public function find($id)
	{
		$find = $this->getById($id);
		return count($find) > 0 ? array_shift($find) : [];
	}
}