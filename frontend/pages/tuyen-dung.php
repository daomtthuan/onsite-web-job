<?php
require_once __DIR__ . '/../../bootstrap.php';
// include_once __DIR__ . '/../../dbconnect.php';

$items = [
  0 => [
    'no'         => 1,
    'position'   => 'Phát triển Web Front-end',
    'department' => 'Phát triển',
    'location'   => 'Hà Nội',
  ],
  1 => [
    'no'         => 2,
    'position'   => 'Nhân viên kiểm thử',
    'department' => 'Sản phẩm',
    'location'   => 'Hà Nội',
  ],
  2 => [
    'no'         => 3,
    'position'   => 'Trưởng nhóm tiếp thị hiệu suất',
    'department' => 'Marketing',
    'location'   => 'Hà Nội',
  ],
  3 => [
    'no'         => 4,
    'position'   => 'Phát triển Web Back-end PHP',
    'department' => 'Phát triển',
    'location'   => 'Hà Nội',
  ],
  4 => [
    'no'         => 5,
    'position'   => 'Chuyên gia SEO',
    'department' => 'Marketing',
    'location'   => 'Hà Nội',
  ],
  5 => [
    'no'         => 7,
    'position'   => 'Hỗ trợ khách hàng',
    'department' => 'Hỗ trợ khách hàng',
    'location'   => 'Hà Nội',
  ],
];

$fields = [
  0 => [
    'key'      => 'no',
    'label'    => 'Stt',
    'sortable' => true,
    'class'    => 'align-middle text-md-right',
  ],
  1 => [
    'key'      => 'position',
    'label'    => 'Vị trí',
    'sortable' => true,
    'class'    => 'align-middle',
  ],
  2 => [
    'key'      => 'department',
    'label'    => 'Bộ phận',
    'sortable' => true,
    'class'    => 'align-middle',
  ],
  3 => [
    'key'      => 'location',
    'label'    => 'Địa điểm',
    'sortable' => true,
    'class'    => 'align-middle',
  ],
];

echo $twig->render('frontend/pages/tuyen-dung.html.twig', [
  'el'   => 'table-jobs',
  'data' => json_encode([
    'items'  => $items,
    'fields' => $fields,
  ]),
]);