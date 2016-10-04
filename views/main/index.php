<?php
use yii\bootstrap\Carousel;

?>

    <style>
        .wrap > .container {
            padding: 0 !important;
        }
    </style>

<?php
echo Carousel::widget(
    [
        'items' => [
            [
                'content' => '<img style="width:100%" src="images/11348642_830927143627939_707319335_o.jpg"/>',
                'options' => [],
            ],
            [
                'content' => '<img style="width:100%" src="images/11414682_830926586961328_1845511521_o.jpg"/>',
                'options' => [],
            ],
            [
                'content' => '<img style="width:100%" src="images/11425749_830927140294606_1034236317_o.jpg"/>',
                'options' => [],
            ],
            [
                'content' => '<img style="width:100%" src="images/11426128_830927973627856_2095224216_o.jpg"/>',
                'options' => [],
            ],
            [
                'content' => '<img style="width:100%" src="images/fPZ1dQQpJx0.jpg"/>',
                'options' => [],
            ],

        ],
    ]
);
