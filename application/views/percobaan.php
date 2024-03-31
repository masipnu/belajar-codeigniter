<?php
defined('BASEPATH') OR exit('No direct script access allowed');
echo doctype();
$meta = array(
	array('name'=>'robots', 'content'=>'no-cache'),
	array('name'=>'description', 'content'=>'My Great Site'),
	array('name'=>'keywords', 'content'=>'love, passion, intrigue'),
	array('name'=>'robots', 'content'=>'no-cache'),
	array('http-equiv'=>'Content-type', 'content'=>'text/html', 'charset'=>'utf-8')
);
echo meta($meta);
?>
<head>
	<meta charset="utf-8">
	<title>Halaman Percobaan</title>

	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
		text-decoration: none;
	}

	a:hover {
		color: #97310e;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body {
		margin: 0 15px 0 15px;
		min-height: 96px;
        border-bottom: 1px solid salmon;
	}

	p {
		margin: 0 0 10px;
		padding:0;
	}

	p.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	#container {
		margin: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}
	</style>
</head>
<body>

<div id="container">
    <?php echo heading('Halaman Percobaan', 1) ?>
	<div id="body">
        
        <?php
        // Membuat form
        // echo form_open('email/send') ;

        // Membuat form-2
        $attributes = array('class'=>'email', 'id'=>'myform');
        echo form_open('email/send', $attributes);
        
        // Membuat label
        echo form_label('Siapa namamu?', 'username').'<br>';

        // Membuat Textbox
        echo form_input('username','Masipnu');

        // Membuat input dengan action javascript
        $js = 'onClick="alert(\'Ini adalah input dengan fungsi\')"';
        echo form_input('username','John Doe',$js);

        // Form Password
        $data = array(
            'name'=>'username',
            'id'=>'username',
            'value'=>'johndoe',
            'maxlength'=>'100',
            'size'=>'10',
            'style'=>'width:50%'
        );
        echo form_password($data);

        // Hidden Field
        echo form_hidden('username', 'johndoe');

        // Multi-Hidden Field
        $hidden_data = array(
            'name'=>'John Doe',
            'email'=>'john@gmail.com',
            'url'=>'http://gmail.com'
        );
        echo form_hidden($hidden_data);

        ?>
        

	</div>

    <div id='body'>
        <?php
        // Radio Button
        echo heading('Radio Button',3);
        $data = array(
            'name'=> 'jk',
            'id'=>'jk-laki',
            'value'=>'laki-laki',
            'checked'=>TRUE,
            'style'=>'margin:10px'
        );
        echo form_radio($data);
        ?>
        Laki-laki
    </div>


    <div id='body'>
    <?php
        // Membuat checkbox
        echo heading('Checkbox',3);
        $data = array(
            'name'=>'newsletter',
            'id'=>'newsletter',
            'value'=>'accept',
            'checked'=>TRUE,
            'style'=>'margin:10px'
        );
        echo form_checkbox($data);
        ?>
        Ini Checkbox
    </div>

    <div id='body'>
        <?php
        // Textarea
        echo heading('Textarea',3);
        $data = array(
            'name'=>'username',
            'id'=>'username',
            'value'=>'johndoe',
            'cols'=>'100',
            'rows'=>'15',
            'style'=>'width:50'
        );
        echo form_textarea($data);
        ?>

    </div>

    <div id='body'>
        <?php
        // Upload File
        echo heading('Upload Gambar',3);
        $data = array(
            'name'=>'buah',
            'id'=>'buah-alpukat',
        );
        echo form_upload($data);
        
        ?>
    </div>

    <div id='body'>
        <?php
        // Dropdown
        echo heading('Dropdown',3);
        $buah = array(
            'apel'=>'Apel',
            'mangga'=>'Mangga',
            'jeruk'=>'Jeruk',
            'jambu'=>'Jambu'
        );
        echo form_dropdown('buah-buahan',$buah,'jeruk');
        ?>
    </div>
    
    <div id='body'>
        <?php
        // Submit
        echo heading('Submit',3);
        echo form_submit('mysubmit','Submit Post!');
        ?>
    </div>

    <div id='body'>
        <?php
        // Reset
        echo heading('Reset',3);
        echo form_reset('myreset','Reset!')
        ?>
    </div>

    <div id='body'>
        <?php
        // Button
        echo heading('Button',3);
        echo form_button('name','Content')
        ?>
    </div>

	<p class="footer">Halaman dimuat dalam <strong>{elapsed_time}</strong> detik. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>

</body>
</html>