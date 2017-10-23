<?php
defined('COMMENTLIMIT') OR exit('No direct script access allowed');
class MainController
{
	public function comment()
	{	
		$error = array();
		$second_name = '';
		$first_name  = '';
		$third_name  = '';
		$phone       = '';
		$region 	 = '';
		$city 		 = '';
		$email       = '';
		$comment	 = '';		
		if(!$_POST)
		{
			require_once('views/comment.php');
			exit();
		}
		//Проверяем полученные данные
		if(!$_POST['second_name'])
		{
			$error['second_name'] = 'Поле "Фамилия" должно быть заполнено';
		}

		if(!$_POST['first_name'])
		{
			$error['first_name'] = 'Поле "Имя" должно быть заполнено';
		}

		if($_POST['phone'] && !$this->check_phone($_POST['phone']))
		{
			$error['phone'] = 'Неверный формат номера телефона';
		}

		if(!$_POST['region'])
		{
			$error['region'] = 'Не указан регион';
		}

		if($_POST['region'] && !$this->check_region($_POST['region']))
		{
			$error['region'] = 'Отсутствует регион с таким ID';
		}

		if(!$_POST['city'])
		{
			$error['city'] = 'Не указан город';
		}

		if($_POST['region'] && $_POST['city'] && $this->check_region($_POST['region']) && !$this->check_city($_POST['region'], $_POST['city']))
		{
			$error['city'] = 'Отсутствует данный город в списке для выбранного региона';
		}

		if($_POST['email'] && !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
		{
			$error['email'] = 'Неверный формат Email';
		}

		if(!$_POST['comment'])
		{
			$error['comment'] = 'Поле "Комментарий" должно быть заполнено';
		}

		$second_name = htmlspecialchars($_POST['second_name']);
		$first_name  = htmlspecialchars($_POST['first_name']);
		$third_name  = $_POST['third_name'] ? htmlspecialchars($_POST['third_name']) : '';
		$phone       = $_POST['phone'] ? htmlspecialchars($_POST['phone']) : '';
		$region 	 = htmlspecialchars($_POST['region']);
		$city 		 = htmlspecialchars($_POST['city']);
		$email       = $_POST['email'] ? htmlspecialchars($_POST['email']) : '';
		$comment	 = htmlspecialchars($_POST['comment']);
		if($error)
		{
			require_once('views/comment.php');
			exit();			
		}
		if(MainModel::add_comment($second_name, $first_name, $third_name, $phone, $region, $city, $email, $comment))
		{
			require_once('views/add_success.php');
		} else {
			require_once('views/add_error.php');		
		}

	}

	public function view($num_page = 1)
	{
		if(!preg_match('/^\+?\d+$/', $num_page))
		{
			$num_page = 1;
		}
		$comments = MainModel::get_limit_comment($num_page);
		if(!$comments || $comments->num_rows === 0)
		{
			require_once('views/view_empty.php');
			exit;
		}
		require_once('views/view.php');
	}

	public function del($id)
	{
		if(!preg_match('/^\+?\d+$/', $id) || !$this->check_comment($id))
		{
			header('Location: /view/');
			exit;			
		}
		if(MainModel::del_comment($id))
		{
			require_once('views/del_success.php');
		} else {
			require_once('views/del_error.php');		
		}
	}

	public function stat()
	{
		$region_min = 5;
		$region = MainModel::region_stat($region_min);
		require_once('views/stat.php'); 
	}

	public function stat_city($id)
	{
		if(!preg_match('/^\+?\d+$/', $id))
		{
			header('Location: /stat/');
			exit;			
		}
		$city = MainModel::city_stat($id);
		require_once('views/stat_city.php');		
	}

	public function error()
	{
		require_once('views/error.php');
	}

	public function region()
	{
		$all_region = MainModel::get_all_region();
		require_once('views/region.php');
	}

	public function city($id = 1)
	{
		$all_city = MainModel::get_city($id);
		require_once('views/city.php');
	}	

	private function pagination($number = 1)
	{
		$active_number = $number;
		$all_comment = MainModel::get_all_comment();
		$num_all_comment = $all_comment->num_rows;
		$num_pagination = ceil($num_all_comment / COMMENTLIMIT);
		require_once('views/pagination.php');
	}

	private function check_phone($phone)
	{
		if(preg_match('/^\([0-9]{3}\)\s[0-9]{3}-[0-9]{2}-[0-9]{2}+$/', $phone))
		{
			return true;
		} else {
			return false;
		}
	}

	private function check_region($region)
	{
		$result = MainModel::check_region($region);
		if($result->num_rows === 0)
		{
			return false;
		} else {
			return true;
		}
	}

	private function check_city($region, $city)
	{
		$result = MainModel::check_city($region, $city);
		if($result->num_rows === 0)
		{
			return false;
		} else {
			return true;
		}
	}

	private function check_comment($id)
	{
		$result = MainModel::check_comment($id);
		if($result->num_rows === 0)
		{
			return false;
		} else {
			return true;
		}		
	}

	private function num_comment_region($id)
	{
		$result = MainModel::num_comment_region($id);
		return $result->num_rows;
	}

	private function num_comment_city($id)
	{
		$result = MainModel::num_comment_city($id);
		return $result->num_rows;
	}					
}
?>