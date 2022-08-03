<?php
    class EmployeeController extends Controller {
        
        public static function employeeForm() {
            include "./View/modules/Employee/employee_form.php";
        }

        public static function saveEmployee() {
            $model = new EmployeeModel();

            $model->name = $_POST['name_employee'];
            $model->email = $_POST['email_employee'];
            $model->pass = $_POST['password_employee'];
            if(isset($_POST['adm_employee'])) $model->adm = $_POST['adm_employee'];

            $model->saveEmployee();
            header("Location: /employee/form");
        }

        public static function employeeManage() {
            $model = new EmployeeModel();
            $arr_employee = $model->getAllRows();
            
            include "./View/modules/Employee/employee_manage.php";
        }

        public static function employeeDelete() {
            $model = new EmployeeModel();
            $model->deleteEmployee( (int) $_GET['id']);
            header("Location: /employee-manage");
        }
    }