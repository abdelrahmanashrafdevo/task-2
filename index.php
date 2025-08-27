<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Team Problem Counter</title>
</head>
<body>
    <h2>Number of Problems the Team Will Solve</h2>

    <form method="post">
        <label>Enter the number of problems and opinion lines (each line contains 3 numbers separated by a space):</label><br>
        <textarea name="input" rows="10" cols="50" placeholder="3&#10;1 1 0&#10;1 1 1&#10;1 0 0"></textarea><br><br>
        <button type="submit">Calculate</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $input = trim($_POST["input"]);

        // Split lines
        $lines = explode("\n", $input);

        // Extract number of problems
        $numberOfProblems = intval(array_shift($lines));

        $solved = 0;

        foreach ($lines as $line) {
            $parts = explode(" ", trim($line));

            if (count($parts) === 3) {
                $petya = intval($parts[0]);
                $vasya = intval($parts[1]);
                $tonya = intval($parts[2]);

                if ($petya + $vasya + $tonya >= 2) {
                    $solved++;
                }
            }
        }

        echo "<p><strong>Number of problems that will be solved: $solved</strong></p>";
    }
    ?>
</body>
</html>
