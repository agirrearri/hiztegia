<ul>
<?php
$menu_item_class_name = 'main_menu_item';
echo('<li>');
echo anchor('berba/home' ,'Honi buruz' , array('title'=>'Honi buruz', 'class'=>$menu_item_class_name, 'name'=>'home'));
echo('</li>');
echo('<br>');
echo('<li>');
echo anchor('#' ,'Hiztegia' , array('title'=>'Hiztegia', 'class'=>$menu_item_class_name, 'name'=>'hiztegia'));
echo('</li>');
echo('<br>');
echo('<li>');
echo anchor('berba/tagdunak/5' ,'Ondarroako berbak' , array('title'=>'Ondarroakoak', 'class'=>$menu_item_class_name, 'name'=>'ondarroakoak'));
echo('</li>');
echo('<br>');
echo('<li>');
echo anchor('berba/tagdunak/1' ,'Itsasoko berbak' , array('title'=>'Itsasoko berbak', 'class'=>$menu_item_class_name, 'name'=>'itsasokoak'));
echo('</li>');
echo('<br>');
echo('<li>');
echo anchor('berba/ondarrutarrak' ,'Pertsonak' , array('title'=>'Pertsonak', 'class'=>$menu_item_class_name, 'name'=>'ondarrutarrak'));
echo('</li>');
echo('<li>');
echo anchor('berba/protagonistak' ,'Protagonistak' , array('title'=>'Protagonistak', 'class'=>$menu_item_class_name, 'name'=>'protagonistak'));
echo('</li>');
echo('<li>');
echo anchor('berba/desixenak' ,'Ondarroan desixenak' , array('title'=>'Ondarroan desixenak', 'class'=>$menu_item_class_name, 'name'=>'desixenak'));
echo('</li>');
echo('<br>');
/*
echo('<li>');
echo anchor('berba/azkenak' ,'Azkenak' , array('title'=>'Azkenak', 'class'=>$menu_item_class_name, 'name'=>'azkenak'));
echo('</li>');
echo('<li>');
echo anchor(base_url().'berba/iruzkinduenak' ,'Bolo bolo' , array('title'=>'Bolo bolo', 'class'=>$menu_item_class_name, 'name'=>'iruzkinduenak'));
echo('</li>');
echo('<li>');
echo anchor(base_url().'tag/guztiak' ,'Gaiak' , array('title'=>'Gaiak', 'class'=>$menu_item_class_name, 'name' => 'gaiak'));
echo('</li>');

echo('<li>');
echo anchor('berba/guri_buruz' ,'Gu' , array('title'=>'Guri buruz', 'class'=>$menu_item_class_name, 'name' => 'gu'));
echo('</li>');
*/
?>
</ul>