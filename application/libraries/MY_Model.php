<?php
/*
 * Author: Yotsakon Pitinanon
 * Website: www.siamwebcare.com
 * Email: yotmanu@hotmail.com
 * Version: 0.6
 */
class MY_Model extends Model{
	
	public $table = '';
	public $primary_key = 'ID';
	public $mode = '';
	public $select = '*';
	public $where = '';
	public $join = '';
	public $sort = '';
	public $order = 'asc';
	public $target = '';
	public $limit = 12;
	public $pagination = '';
	public $current_page = '';
	public $record_count = '';
	public $handle;
	
	function __construct()
	{
		parent::__construct();
		$this->sort($this->primary_key);
		$this->target();
		$this->current_page = number_format(@$_GET['page']);	
	}
	
	function free_result()
	{
		$this->mode = '';
		$this->select = '*';
		$this->where = '';
		$this->sort = 'order by ' . $this->primary_key;
		$this->order = 'asc';
		$this->target = '';
		$this->limit = 12;
		$this->current_page = '';
		$this->__construct();
	}
	
	function primary_key($field)
	{
		$this->primary_key = $field;
		return $this;
	}
	
	function table($table)
	{
		$this->table = $table;
		return $this;
	}
	
	function target($target = FALSE)
	{
		if($target)
		{
			$this->target = $target;	
		}
		else
		{
			$string = $_SERVER['REQUEST_URI'];
			$pattern = '/(&page=[0-9]+)/i';
			$replacement = '';
			$this->target = preg_replace('/([&?]+page=[0-9]+)/i', '',  $_SERVER['REQUEST_URI']);
		}
		return $this;
	}
	
	function current_page($param)
	{
		$this->current_page = $param;
		return $this;
	}
	
	function select($field = ' * ')
	{
		$this->select = $field;
		return $this;
	}
	
	function where($condition)
	{
		if($condition)
		{
			$this->where = ' where ' . $condition;
		}
		return $this;
	}
	
	function join($condition)
	{
		$this->join = $condition;
		return $this;
	}
	
	function sort($sort)
	{
		$this->sort = 'order by ' . $sort;
		return $this;
	}
	
	function order($order)
	{
		$this->order = $order;
		return $this;
	}
	
	function limit($limit)
	{
		$this->limit = $limit;
		return $this;
	}
	
	function order_by($sort,$order)
	{
		$this->sort($sort);
		$this->order($order);
		return $this;
	}
	
	function get($sql = FALSE,$noSplitPage = FALSE)
	{
		$sql = $sql ? $sql : 'select '.$this->select.' from '.$this->table.' '.$this->join.' '.$this->where.' '.$this->sort.' '.$this->order;
		//$sql = iconv('UTF-8','TIS-620',$sql);
		if($noSplitPage==FALSE)
		{
			$this->load->library('pagination');
			$page = new pagination();
			$page->target($this->target);
			$page->limit($this->limit);
			@$page->currentPage($this->current_page);
			$rs = $this->db->PageExecute($sql,$page->limit,$page->page);
			$page->Items($rs->_maxRecordCount);
			$this->pagination = $page->show();
		}
		else
		{
			$rs = $this->db->Execute($sql);
		}
		$this->free_result();
		$data = $rs->GetArray();
		///array_walk($data,'dbConvert');
		
		return $data;
	}
	
	
	function get_one($field=FALSE,$id=FALSE,$value = FALSE)
	{
		//$this->db->debug=TRUE;
		if($value)
		{
			$result = $this->db->getone('select '.$field.' from '.$this->table.' where '.$this->table.'.'.$id.' = ?',$value);	
		}
		else if($id!=FALSE)
		{
			$result = $this->db->getone('select '.$field.' from '.$this->table.' where '.$this->table.'.'.$this->primary_key.' = ?',$id);
		}
		else{
			$result = $this->db->getone('select '.$this->select.' from '.$this->table.' '.$this->where);
		}
		$this->free_result();
	//	dbConvert($result);
		return $result;
	}
	
	function get_row($id = FALSE,$value = FALSE)
	{
		if($value)
		{
			$result = $this->db->getrow('select '.$this->select.' from '.$this->table.' '.$this->join.' where '.$this->table.'.'.$id.' = ?',$value);	
		}
		else if($id)
		{
			$result = $this->db->getrow('select '.$this->select.' from '.$this->table.' '.$this->join.' where '.$this->table.'.'.$this->primary_key.' = ?',$id);
		}
		else if($this->where != "")
		{
			$result = $this->db->getrow('select '.$this->select.' from '.$this->table.' '.$this->join.' '.$this->where);
		}
		$this->free_result();
		//@array_walk($result,'dbConvert');
		//return @array_change_key_case($result);
		return $result;
	}
	
	function pagination()
	{
		return $this->pagination;
	}
	
	function save($data)
	{	
		$columns = $this->db->MetaColumnNames($this->table);
		$meta = $this->db->MetaColumns($this->table);
		//array_walk($data,'dbConvert','TIS-620');
		$data = array_change_key_case($data, CASE_UPPER);
		$data = array_intersect_key($data,$columns);
		@$mode = ($data[$this->primary_key]) ? 'UPDATE' : 'INSERT';
		@$where = ($data[$this->primary_key]) ? $this->primary_key.' = '.$data[$this->primary_key] : FALSE;
		@$pk = $data[$this->primary_key];
		unset($data[$this->primary_key]);
		if($mode=='INSERT')
		{
			$column = '';
			$value = '';
			$comma = '';
			foreach($data as $key => $item)
			{
				$column .= $comma.''.$key.'';
				if($meta[$key]->type=='N')
				{
						$value .= $item == '' ? $comma."0" : $comma.str_replace(',','',$item);
				}
				else
				{
						if($this->table=='abstract' || $this->table=='tmp_abstract'){
						$item = str_replace("'","&#39;", $item);
						$item = str_replace('"',"&#34;", $item);
						}
						$value .=  $comma.'\''.$item.'\'';						
						//$value .=  $comma.'\''.str_replace("'","&#39;", $item).'\'';												
				}
			
				$comma = ',';
			}
			if($this->table=='regist_person'){
				if($_POST['email']!=''){
					$sql = 'INSERT INTO '.$this->table.'('.$this->primary_key.','.$column.') VALUES ("",'.$value.')';
					$this->db->Execute($sql);
				}
			}else{
				$sql = 'INSERT INTO '.$this->table.'('.$this->primary_key.','.$column.') VALUES ("",'.$value.')';
				$this->db->Execute($sql);
			}
		}
		else
		{
			$column = '';
			$comma = '';
			foreach($data as $key => $item)
			{
				if($meta[$key]->type=='N')
				{
					$column .= $comma.$key.' = '.$item;
				}
				else
				{	
					if($this->table=='abstract'){
					$item = str_replace("'","&#39;", $item);
					$item = str_replace('"',"&#34;", $item);										
					}
					$column .= $comma.''.$key.' = \''.$item.'\'';
					//$column .= $comma.''.$key.' = \''.str_replace("'","&#39;", $item).'\'';
					
				}
				$comma = ',';
			}
			$this->db->Execute('UPDATE '.$this->table.' SET '.$column.' WHERE '.$where);
		}
		return ($mode == 'UPDATE') ? $pk : $this->db->getOne('select MAX('.$this->primary_key.') from '.$this->table);
	}
	
	function delete($id,$value = FALSE,$all = FALSE)
	{
		if($all)
		{				
			$this->db->Execute('delete from '.$this->table);
		}
		else
		{
			if($value)
			{
				$this->db->Execute('delete from '.$this->table.' where '.$id.' = ?',$value);
			}
			else
			{
				$this->db->Execute('delete from '.$this->table.' where '.$this->table.'.ID = ?',$id);
			}
		}
		
	}

	function get_option($value,$text,$table = FALSE)
	{
		$table = $table ? $table : $this->table;
		$result = $this->db->getassoc('select '.$value.','.$text.' from '.$table);
		//array_walk($result,'dbConvert');
		return $result;
	}

	function is_available($field,$data,$table = FALSE,$option)
	{
		$table = $table ? $table : $this->table;
		$result = $this->db->getone('select '.$field.' from '.$table.' where '.$option.$field.' = ?',$data);
		return $result ? FALSE : TRUE;	
	}
	
	function counter($id,$field = 'counter',$table = FALSE)
	{
		$table = $table ? $table : $this->table;
		$this->db->execute('update '.$table.' set '.$field.' = '.$field.' + 1 where id = ?',$id);
	}
	
	function upload(&$file,$path = 'uploads/',$resize = FALSE,$width = FALSE,$height = FALSE,$ratio = FALSE)
	{
		if($file['name'])
		{
			ini_set("max_execution_time","600");
			ini_set("memory_limit","12M");
			$this->load->library('uploader');
			$handle = new Uploader();
			$handle->Upload($file);
			$this->handle =& $handle;
			if($resize)
			{
				return $this->thumb($path, $width, $height, $ratio);
			} 
			else
			{
				$this->handle->process($path);
				if($this->handle->processed) 
				{
					return $this->handle->file_dst_name;
				}
			}	
		}	
	}
	
	function thumb($path,$width,$height,$ratio = FALSE)
	{
		if($this->handle)
		{
			$this->handle->image_resize = TRUE;
			$this->handle->image_ratio_crop = TRUE;
			if($ratio)
			{
				if($ratio == 'x')
				{
					$this->handle->image_y = $height;
					$this->handle->image_ratio_x = TRUE;			
				}
				if($ratio == 'y')
				{
					$this->handle->image_x = $width;
					$this->handle->image_ratio_y = TRUE;			
				}
			}
			else
			{
				$this->handle->image_x = $width;	
				$this->handle->image_y = $width;
			}
			$this->handle->process($path);
			if($this->handle->processed) 
			{
				return $this->handle->file_dst_name;
			}
		}
	}
	
	function delete_file($id,$path,$field = 'image',$value)
	{
		
		$file = $this->get_one($field,$id,$value);
		//return $file;
		@unlink($path.$file);
	}

}
?>