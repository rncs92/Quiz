<?php declare(strict_types=1);

namespace Vendon\Controllers\Quiz;

use Vendon\Core\Redirect;
use Vendon\Core\Session;
use Vendon\Core\TwigView;
use Vendon\Services\Quiz\Create\CreatePDOQuizRequest;
use Vendon\Services\Quiz\Create\CreatePDOQuizService;

class CreateController
{
    private CreatePDOQuizService $quizService;

    public function __construct(
        CreatePDOQuizService $quizService
    )
    {
        $this->quizService = $quizService;
    }

    public function index(): TwigView
    {
        if (!Session::get('user')) {
            return new TwigView('User/login', []);
        }
        return new TwigView('Quiz/create', []);
    }

    public function store(): Redirect
    {
        $user = Session::get('user');
        $userId = $user->getUserId();

        $this->quizService->handle(
            new CreatePDOQuizRequest(
                $_POST['title'],
                (int)$userId,
                $_POST['questions']
            )
        );

        return new Redirect('/index');
    }
}
/*
 * <script>
    $(document).ready(function () {
        let questionCounter = 1;

        // Function to add a new question
        function addQuestion() {
            var questionHtml = `<div class="w-full mt-4">
            <label class="flex justify-center mt-4 text-lg font-semibold" for="question_${questionCounter}">Jautājums Nr. ${questionCounter}</label>
            <input type="text" id="question_${questionCounter}" name="questions[]" class="mt-4 w-2/3 bg-gray-50 border border-gray-300 text-gray-900 rounded-lg p-2.5" placeholder="Ievadiet jautājumu" required>
            <label for="correct_answer_${questionCounter}" class="mt-2"></label>
            <input type="text" id="correct_answers_${questionCounter}" name="correct_answers[]" class="mt-2 w-2/3 bg-gray-50 border border-gray-300 text-gray-900 p-2 rounded-md" placeholder="Ievadiet pareizo atbildi" required>
            <div class="mt-2">
                <input type="text" name="answers[]" class="mt-2 bg-gray-50 border border-gray-300 text-gray-900 p-2 rounded-md" placeholder="Ievadiet atbildes variantu" required>
                <button type="button"
                        class="removeAnswer text-white py-2 px-3 ml-2">
                    <svg xmlns="http://www.w3.org/2000/svg"
                         width="20"
                         height="20"
                         fill="red"
                         class="bi bi-x"
                         viewBox="0 0 16 16">
                    <path d="M4.293 4.293a1 1 0 0 1 1.414 0L8 6.586l2.293-2.293a1 1 0 1 1 1.414 1.414L9.414 8l2.293 2.293a1 1 0 0 1-1.414 1.414L8 9.414l-2.293 2.293a1 1 0 0 1-1.414-1.414L6.586 8 4.293 5.707a1 1 0 0 1 0-1.414z"/>
                    </svg>
                </button>
            </div>
            <button type="button" class="addAnswer mt-2 bg-blue-500 text-white py-2 px-4 rounded-full mt-2">Pievienot atbildi</button>
            <button type="button" class="removeQuestion mt-2 bg-red-500 text-white py-2 px-3 rounded-full ml-2">Dzēst jautājumu</button>
        </div>`;

            $("#questionContainer").append(questionHtml);
            questionCounter++;
        }

        // Add the first question when the page loads
        addQuestion();

        // Add a new question and answer fields when "Add Question" button is clicked
        $("#addQuestion").click(function () {
            addQuestion();
        });

        // Add a new answer field when "Add UserAnswer" button is clicked
        $("#questionContainer").on("click", ".addAnswer", function () {
            var answerInput = `<input type="text" name="answers[]" class="mt-2 bg-gray-50 border border-gray-300 text-gray-900 p-2 rounded-md" placeholder="Ievadiet atbiles variantu" required>`;
            var removeButton = `<button type="button"
                        class="removeAnswer text-white py-2 px-3 ml-2">
                    <svg xmlns="http://www.w3.org/2000/svg"
                         width="20"
                         height="20"
                         fill="red"
                         class="bi bi-x"
                         viewBox="0 0 16 16">
                    <path d="M4.293 4.293a1 1 0 0 1 1.414 0L8 6.586l2.293-2.293a1 1 0 1 1 1.414 1.414L9.414 8l2.293 2.293a1 1 0 0 1-1.414 1.414L8 9.414l-2.293 2.293a1 1 0 0 1-1.414-1.414L6.586 8 4.293 5.707a1 1 0 0 1 0-1.414z"/>
                    </svg>
                </button>`;

            $(this).prev().after(answerInput + removeButton);
        });

        // Remove an answer field when "Remove UserAnswer" button is clicked
        $("#questionContainer").on("click", ".removeAnswer", function () {
            $(this).prev().remove(); // Remove the input field
            $(this).remove(); // Remove the "Remove UserAnswer" button
        });

        // Remove a question when "Remove Question" button is clicked
        $("#questionContainer").on("click", ".removeQuestion", function () {
            $(this).closest("div").remove(); // Remove the entire question block
        });
    });
</script>
 */