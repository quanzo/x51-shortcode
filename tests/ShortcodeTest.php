<?php
namespace x51\tests\classes\shortcode;
	use \x51\classes\shortcode\Shortcode;

class ShortcodeTest extends \PHPUnit\Framework\TestCase{
	
	public function testS1() {
		$sc=Shortcode::getInstance();
		$this->assertTrue($sc instanceof Shortcode);
		return $sc;
	} // end testS1
	
	/**
	* @depends testS1
	*/
	public function testS2(Shortcode $sc) {
		$sc->add('test1', function ($arAttr, $content){
			$out='';
			foreach ($arAttr as $name => $val) {
				$out.="$name = $val\n";
			}
			$out.=$content;
			return $out;
		});
		$sc->add('bold', function ($arAttr, $content){
			return '<b>'.$content.'</b>';
		});
		
		$Tests=[
			['content'=>'[test1 a=1 b=2]', 'result'=>"a = 1\nb = 2\n"],
			['content'=>'[test1 a=1 b=2] content [/test1]', 'result'=>"a = 1\nb = 2\n content "],
			['content'=>'Hello [bold]world[/bold]!!!', 'result'=>"Hello <b>world</b>!!!"],
			
		];
		foreach ($Tests as $num => $test) {
			//var_dump($sc->do_shortcode($test['content']));
			$this->assertEquals($sc->process($test['content']), $test['result']);
		}
		return $sc;
	} // end testS2
	
	/**
	* @depends testS2
	*/
	public function testS3(Shortcode $sc) {
		$Tests=[
			['content'=>'[day]', 'result'=>date('d')],
		];
		foreach ($Tests as $num => $test) {
			//var_dump($sc->do_shortcode($test['content']));
			$this->assertEquals($sc->process($test['content']), $test['result']);
		}
	} // end testS2
	
} // end class