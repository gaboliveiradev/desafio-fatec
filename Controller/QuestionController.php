<?php
    class QuestionController extends Controller {

        public static function questionForm() {
            parent::isAuthenticated();
            $model = new QuestionModel();
            if(isset($_GET['id'])) $model = $model->getById( (int) $_GET['id']);

            parent::render("Question/question_form", $model);
        }

        public static function questionAnswer() {
            include "./View/modules/Question/question_answer.php";
        }
        
        public static function questionManage() {
            parent::isAuthenticated();
            $model = new QuestionModel();

            if(isset($_GET['query'])) {
                $arr_question = $model->queryQuestion($_GET['query']);
            } else {
                $arr_question = $model->getAllRows();
            }

            include "./View/modules/Question/question_manage.php";
        }

        public static function clearQuery() {
            unset($_GET['query']);
            header("Location: /question-manage");
        }

        public static function saveQuestion() {
            $model = new QuestionModel();
            $model->id = $_POST['id'];
            $model->descricao = $_POST['descricao'];
            $model->saveQuestion();
            header("Location: /question-manage");
        }

        public static function deleteQuestion() {
            $model = new QuestionModel();
            $model->delete( (int) $_GET['id']);
            header("Location: /question-manage");
        }
    }