<?php
$list = array(
anchor('dashboard/berba_inserter', 'Beste berba bat sartu'),
anchor('dashboard', 'Kudeatzailera joan'),
anchor('berba', 'Hiztegira joan'),
anchor('users/logout', 'Kudeatzailetik irten')
);


$attributes = array(
                   
                    );

echo ul($list, $attributes);