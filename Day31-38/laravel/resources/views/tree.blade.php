<?php

$tree = [];

foreach ($users as $user) {
    $parent = $user->Parent;
    $children = explode(',', $user->Children);

    if (!isset($tree[$parent])) {
        $tree[$parent] = [];
    }

    foreach ($children as $child) {
        $tree[$parent][] = $child;
    }
}

print_r($tree);

function generateTreeHTML($tree, $parent = null) {
    $html = '';

    if (isset($tree[$parent])) {
        $html .= '<ul>';

        foreach ($tree[$parent] as $child) {
            $html .= '<li>';
            $html .= '<span class="node">' . $child . '</span>';
            $html .= generateTreeHTML($tree, $child); 
            $html .= '</li>';
        }

        $html .= '</ul>';
    }

    return $html;
}

$treeHTML = generateTreeHTML($tree);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tree View Example</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            padding: 20px;
        }
        ul {
            list-style-type: none;
            padding-left: 20px;
        }
        li {
            margin-bottom: 5px;
        }
        li:before {
            content: "-";
            margin-right: 5px;
        }
        .node {
            cursor: pointer;
            color: blue;
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h1>Tree View Example</h1>
    <div id="treeView" class="tree-view">
        <?php echo $treeHTML; ?>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var nodes = document.querySelectorAll('.node');
            nodes.forEach(function(node) {
                node.addEventListener('click', function() {
                    var ul = this.nextElementSibling;
                    if (ul) {
                        ul.style.display = (ul.style.display === 'none' || ul.style.display === '') ? 'block' : 'none';
                    }
                });
            });
        });
    </script>
</body>
</html>