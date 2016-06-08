<?php
$tree = [
      [
        'name'        => 'Igor',
        'children'    => 2,
        'siblings'    => 0,
        'level'       => 1,
        'descendants' => [
            [
                'name'        => 'Rapid',
                'children'    => 2,
                'siblings'    => 1,
                'level'       => 2,
                'descendants' => [
                    [
                        'name'        => 'Hodor',
                        'children'    => 1,
                        'siblings'    => 1,
                        'level'       => 3,
                        'descendants' => [
                            [
                                'name'        => 'Hodor II',
                                'children'    => 1,
                                'siblings'    => 0,
                                'level'       => 4,
                                'descendants' => [
                                    [
                                        'name'     => 'Hodor III',
                                        'children' => 0,
                                        'siblings' => 0,
                                        'level'    => 5
                                    ]
                                ]
                            ]
                        ]
                    ],
                    [
                        'name'     => 'Rapid II',
                        'children' => 0,
                        'siblings' => 1,
                        'level'    => 3
                    ]
                ]
            ],
            [
                'name'     => 'Thunder',
                'children' => 0,
                'siblings' => 1,
                'level'    => 2
            ]
        ]
    ]
];

// option 1
echo buildTableV($tree);
echo buildTableH($tree);
// opt 2
echo buildTable($tree, '<td>', ['', ''], '</td>');  // H
echo buildTable($tree, '</tr><tr>', ['<td>', '</td>'] );  // V

function buildTable($t, $a, $b=['', ''] , $c='')
{
    if (!isset($t['name'])) $t = $t[0];

    $o = '<table border="1">';
    $o .=  "<tr><td>" . $t['name'] . "</td>" . $a;
    if (isset($t['descendants'])){
      foreach ($t['descendants'] as $key => $son) {
        $o .=  $b[0] . buildTable($son, $a, $b) . $b[1];
      }
    }
    $o .=  $c . '</tr></table>';

    return $o;
}

function buildTableV($t)
{
    if (!isset($t['name'])) $t = $t[0];

    $o = '<table border="1">';
    $o .=  "<tr><td>" . $t['name'] . "</td></tr><tr>";
    if (isset($t['descendants'])){
      foreach ($t['descendants'] as $key => $son) {
        $o .=  "<td>" . buildTableV($son) . "</td>";
      }
    }
    $o .=  '</tr></table>';

    return $o;
}

function buildTableH($t)
{
    if (!isset($t['name'])) $t = $t[0];

    $o = '<table border="1">';
    $o .=  "<tr><td>" . $t['name'] . "</td><td>";
    if (isset($t['descendants'])){
      foreach ($t['descendants'] as $key => $son) {
        $o .=  "" . buildTableH($son) . "";
      }
    }
    $o .=  '</td></tr></table>';

    return $o;
}
