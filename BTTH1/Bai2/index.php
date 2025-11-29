<?php
$questions = [];
$file_path = __DIR__ . '/Quiz.txt';

if (file_exists($file_path)) {
    $content = trim(file_get_contents($file_path));
    $blocks = preg_split('/\n\s*\n/', $content);
    foreach ($blocks as $block) {
        $lines = array_filter(array_map('trim', explode("\n", $block)));
        if (count($lines) < 3) continue;

        $q = array_shift($lines);
        $answers = [];
        foreach ($lines as $line) {
            if (preg_match('/^[A-D]\./', $line)) {
                $answers[] = $line;
            }
        }
        preg_match('/ANSWER:\s*(.+)/', $block, $match);
        $correct_raw = isset($match[1]) ? trim($match[1]) : '';
        $correct_arr = array_map('trim', explode(',', $correct_raw));

        $questions[] = [
            'question' => $q,
            'answers'  => $answers,
            'correct'  => $correct_arr
        ];
    }
}
$score = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $score = 0;
    foreach ($questions as $i => $q) {
        $user_answer = isset($_POST["q$i"]) ? $_POST["q$i"] : [];
        if (!is_array($user_answer)) $user_answer = [$user_answer];

        sort($user_answer);
        $correct_sorted = $q['correct'];
        sort($correct_sorted);

        if ($user_answer == $correct_sorted) {
            $score++;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Trắc Nghiệm Android</title>
    <style>
        body { font-family: Arial; background:#f2f2f2; padding:20px; }
        .card { background:#fff; padding:20px; margin-bottom:15px; border-radius:8px; }
        .question { font-weight:bold; color:#2c3e50; margin-bottom:10px; }
        .correct { color:green; font-weight:bold; }
        .wrong { color:red; font-weight:bold; }
    </style>
</head>
<body>

<h2>Trắc Nghiệm Android</h2>

<?php if ($score !== null): ?>
    <h3>Kết quả: <span style="color:blue;"><?php echo $score; ?>/<?php echo count($questions); ?></span></h3>
<?php endif; ?>

<form method="post">

<?php foreach ($questions as $i => $q): ?>
    <div class="card">
        <div class="question">
            Câu <?php echo $i+1; ?>: <?php echo $q['question']; ?>
        </div>

        <?php foreach ($q['answers'] as $ans): 
            $val = substr($ans, 0, 1);
            $checked = '';

            if ($score !== null && isset($_POST["q$i"])) {
                $user_answer = $_POST["q$i"];
                if (!is_array($user_answer)) $user_answer = [$user_answer];
                if (in_array($val, $user_answer)) $checked = 'checked';
            }

            $is_correct = in_array($val, $q['correct']);
            $ans_class = "";
            if ($score !== null) {
                if ($is_correct) $ans_class = "correct";
                elseif ($checked) $ans_class = "wrong";
            }
        ?>

        <label class="<?php echo $ans_class; ?>">
            <input 
                type="<?php echo count($q['correct']) > 1 ? 'checkbox' : 'radio'; ?>" 
                name="q<?php echo $i; ?><?php echo count($q['correct']) > 1 ? '[]' : ''; ?>" 
                value="<?php echo $val; ?>" 
                <?php echo $checked; ?>
            >
            <?php echo $ans; ?>
        </label><br>

        <?php endforeach; ?>

        <?php if ($score !== null): ?>
            <div style="margin-top:8px;">
                <b>Đáp án đúng:</b> 
                <?php echo implode(", ", $q['correct']); ?>
            </div>
        <?php endif; ?>
    </div>
<?php endforeach; ?>

<button type="submit" style="padding:10px 20px; font-size:16px;">Nộp bài</button>

</form>

</body>
</html>
