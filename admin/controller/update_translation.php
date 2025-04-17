<?php 

/*--------------------*/
// Description: Affilink - Coupons & Deals Php Script
// Author: Wicombit
// Author URI: https://www.wicombit.com
/*--------------------*/

session_start();
if (isset($_SESSION['user_email'])){
    
require '../../config.php';
require '../functions.php';

$connect = connect($database);
if(!$connect){
	header('Location: ./error.php');
	} 

$check_access = check_access($connect);

if ($check_access['user_role'] == 1){

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

	$tr_maintenancepage = $_POST['tr_maintenancepage'];
	$tr_maintenancetitle = $_POST['tr_maintenancetitle'];
	$tr_maintenancesub = $_POST['tr_maintenancesub'];
	$tr_profilepage = $_POST['tr_profilepage'];
	$tr_signinpage = $_POST['tr_signinpage'];
	$tr_signuppage = $_POST['tr_signuppage'];
	$tr_resetpage = $_POST['tr_resetpage'];
	$tr_forgotpage = $_POST['tr_forgotpage'];
	$tr_termsandconds = $_POST['tr_termsandconds'];
	$tr_aboutus = $_POST['tr_aboutus'];
	$tr_eptitle = $_POST['tr_eptitle'];
	$tr_epsubtitle = $_POST['tr_epsubtitle'];
	$tr_eptagline = $_POST['tr_eptagline'];
	$tr_epbutton = $_POST['tr_epbutton'];
	$tr_1 = $_POST['tr_1'];
	$tr_2 = $_POST['tr_2'];
	$tr_3 = $_POST['tr_3'];
	$tr_4 = $_POST['tr_4'];
	$tr_5 = $_POST['tr_5'];
	$tr_6 = $_POST['tr_6'];
	$tr_7 = $_POST['tr_7'];
	$tr_8 = $_POST['tr_8'];
	$tr_9 = $_POST['tr_9'];
	$tr_10 = $_POST['tr_10'];
	$tr_11 = $_POST['tr_11'];
	$tr_12 = $_POST['tr_12'];
	$tr_13 = $_POST['tr_13'];
	$tr_14 = $_POST['tr_14'];
	$tr_15 = $_POST['tr_15'];
	$tr_16 = $_POST['tr_16'];
	$tr_17 = $_POST['tr_17'];
	$tr_18 = $_POST['tr_18'];
	$tr_19 = $_POST['tr_19'];
	$tr_20 = $_POST['tr_20'];
	$tr_21 = $_POST['tr_21'];
	$tr_22 = $_POST['tr_22'];
	$tr_23 = $_POST['tr_23'];
	$tr_24 = $_POST['tr_24'];
	$tr_25 = $_POST['tr_25'];
	$tr_26 = $_POST['tr_26'];
	$tr_27 = $_POST['tr_27'];
	$tr_28 = $_POST['tr_28'];
	$tr_29 = $_POST['tr_29'];
	$tr_30 = $_POST['tr_30'];
	$tr_31 = $_POST['tr_31'];
	$tr_32 = $_POST['tr_32'];
	$tr_33 = $_POST['tr_33'];
	$tr_34 = $_POST['tr_34'];
	$tr_35 = $_POST['tr_35'];
	$tr_36 = $_POST['tr_36'];
	$tr_37 = $_POST['tr_37'];
	$tr_38 = $_POST['tr_38'];
	$tr_39 = $_POST['tr_39'];
	$tr_40 = $_POST['tr_40'];
	$tr_41 = $_POST['tr_41'];
	$tr_42 = $_POST['tr_42'];
	$tr_43 = $_POST['tr_43'];
	$tr_44 = $_POST['tr_44'];
	$tr_45 = $_POST['tr_45'];
	$tr_46 = $_POST['tr_46'];
	$tr_47 = $_POST['tr_47'];
	$tr_48 = $_POST['tr_48'];
	$tr_49 = $_POST['tr_49'];
	$tr_50 = $_POST['tr_50'];
	$tr_51 = $_POST['tr_51'];
	$tr_52 = $_POST['tr_52'];
	$tr_79 = $_POST['tr_79'];
	$tr_80 = $_POST['tr_80'];
	$tr_81 = $_POST['tr_81'];
	$tr_82 = $_POST['tr_82'];
	$tr_83 = $_POST['tr_83'];
	$tr_84 = $_POST['tr_84'];
	$tr_85 = $_POST['tr_85'];
	$tr_86 = $_POST['tr_86'];
	$tr_87 = $_POST['tr_87'];
	$tr_88 = $_POST['tr_88'];
	$tr_89 = $_POST['tr_89'];
	$tr_90 = $_POST['tr_90'];
	$tr_91 = $_POST['tr_91'];
	$tr_92 = $_POST['tr_92'];
	$tr_93 = $_POST['tr_93'];
	$tr_94 = $_POST['tr_94'];
	$tr_95 = $_POST['tr_95'];
	$tr_96 = $_POST['tr_96'];
	$tr_97 = $_POST['tr_97'];
	$tr_98 = $_POST['tr_98'];
	$tr_99 = $_POST['tr_99'];
	$tr_100 = $_POST['tr_100'];
	$tr_101 = $_POST['tr_101'];
	$tr_102 = $_POST['tr_102'];
	$tr_103 = $_POST['tr_103'];
	$tr_104 = $_POST['tr_104'];
	$tr_105 = $_POST['tr_105'];
	$tr_106 = $_POST['tr_106'];
	$tr_107 = $_POST['tr_107'];
	$tr_108 = $_POST['tr_108'];
	$tr_109 = $_POST['tr_109'];
	$tr_110 = $_POST['tr_110'];
	$tr_111 = $_POST['tr_111'];
	$tr_112 = $_POST['tr_112'];
	$tr_113 = $_POST['tr_113'];
	$tr_114 = $_POST['tr_114'];
	$tr_115 = $_POST['tr_115'];
	$tr_116 = $_POST['tr_116'];
	$tr_117 = $_POST['tr_117'];
	$tr_118 = $_POST['tr_118'];
	$tr_119 = $_POST['tr_119'];
	$tr_120 = $_POST['tr_120'];
	$tr_121 = $_POST['tr_121'];
	$tr_122 = $_POST['tr_122'];
	$tr_123 = $_POST['tr_123'];
	$tr_124 = $_POST['tr_124'];
	$tr_125 = $_POST['tr_125'];
	$tr_126 = $_POST['tr_126'];
	$tr_127 = $_POST['tr_127'];
	$tr_128 = $_POST['tr_128'];
	$tr_129 = $_POST['tr_129'];
	$tr_130 = $_POST['tr_130'];
	$tr_131 = $_POST['tr_131'];
	$tr_132 = $_POST['tr_132'];
	$tr_133 = $_POST['tr_133'];
	$tr_134 = $_POST['tr_134'];
	$tr_135 = $_POST['tr_135'];
	$tr_136 = $_POST['tr_136'];
	$tr_137 = $_POST['tr_137'];
	$tr_138 = $_POST['tr_138'];
	$tr_139 = $_POST['tr_139'];
	$tr_140 = $_POST['tr_140'];
	$tr_141 = $_POST['tr_141'];
	$tr_142 = $_POST['tr_142'];
	$tr_143 = $_POST['tr_143'];
	$tr_144 = $_POST['tr_144'];
	$tr_145 = $_POST['tr_145'];
	$tr_146 = $_POST['tr_146'];
	$tr_147 = $_POST['tr_147'];
	$tr_148 = $_POST['tr_148'];
	$tr_149 = $_POST['tr_149'];
	$tr_150 = $_POST['tr_150'];
	$tr_151 = $_POST['tr_151'];
	$tr_152 = $_POST['tr_152'];
	$tr_153 = $_POST['tr_153'];
	$tr_154 = $_POST['tr_154'];
	$tr_155 = $_POST['tr_155'];
	$tr_156 = $_POST['tr_156'];
	$tr_157 = $_POST['tr_157'];
	$tr_158 = $_POST['tr_158'];
	$tr_159 = $_POST['tr_159'];
	$tr_160 = $_POST['tr_160'];
	$tr_161 = $_POST['tr_161'];
	$tr_162 = $_POST['tr_162'];
	$tr_163 = $_POST['tr_163'];
	$tr_164 = $_POST['tr_164'];
	$tr_165 = $_POST['tr_165'];
	$tr_166 = $_POST['tr_166'];
	$tr_167 = $_POST['tr_167'];
	$tr_168 = $_POST['tr_168'];
	$tr_169 = $_POST['tr_169'];
	$tr_170 = $_POST['tr_170'];
	$tr_171 = $_POST['tr_171'];
	$tr_172 = $_POST['tr_172'];
	$tr_173 = $_POST['tr_173'];
	$tr_174 = $_POST['tr_174'];
	$tr_175 = $_POST['tr_175'];
	$tr_176 = $_POST['tr_176'];
	$tr_177 = $_POST['tr_177'];
	$tr_178 = $_POST['tr_178'];
	$tr_179 = $_POST['tr_179'];
	$tr_180 = $_POST['tr_180'];
	$tr_181 = $_POST['tr_181'];
	$tr_182 = $_POST['tr_182'];
	$tr_183 = $_POST['tr_183'];
	$tr_184 = $_POST['tr_184'];
	$tr_185 = $_POST['tr_185'];
	$tr_186 = $_POST['tr_186'];
	$tr_187 = $_POST['tr_187'];
	$tr_188 = $_POST['tr_188'];
	$tr_189 = $_POST['tr_189'];
	$tr_190 = $_POST['tr_190'];
	$tr_191 = $_POST['tr_191'];
	$tr_192 = $_POST['tr_192'];
	$tr_193 = $_POST['tr_193'];
	$tr_194 = $_POST['tr_194'];
	$tr_195 = $_POST['tr_195'];
	$tr_196 = $_POST['tr_196'];
	$tr_197 = $_POST['tr_197'];
	$tr_198 = $_POST['tr_198'];
	$tr_199 = $_POST['tr_199'];
	$tr_200 = $_POST['tr_200'];

	$statment = $connect->prepare(
	"UPDATE translations SET tr_maintenancepage = :tr_maintenancepage, tr_maintenancetitle = :tr_maintenancetitle, tr_maintenancesub = :tr_maintenancesub, tr_profilepage = :tr_profilepage, tr_signinpage = :tr_signinpage, tr_signuppage = :tr_signuppage, tr_resetpage = :tr_resetpage, tr_forgotpage = :tr_forgotpage, tr_termsandconds = :tr_termsandconds, tr_aboutus = :tr_aboutus, tr_eptitle = :tr_eptitle, tr_epsubtitle = :tr_epsubtitle, tr_eptagline = :tr_eptagline, tr_epbutton = :tr_epbutton, tr_1 = :tr_1, tr_2 = :tr_2, tr_3 = :tr_3, tr_4 = :tr_4, tr_5 = :tr_5, tr_6 = :tr_6, tr_7 = :tr_7, tr_8 = :tr_8, tr_9 = :tr_9, tr_10 = :tr_10, tr_11 = :tr_11, tr_12 = :tr_12, tr_13 = :tr_13, tr_14 = :tr_14, tr_15 = :tr_15, tr_16 = :tr_16, tr_17 = :tr_17, tr_18 = :tr_18, tr_19 = :tr_19, tr_20 = :tr_20, tr_21 = :tr_21, tr_22 = :tr_22, tr_23 = :tr_23, tr_24 = :tr_24, tr_25 = :tr_25, tr_26 = :tr_26, tr_27 = :tr_27, tr_28 = :tr_28, tr_29 = :tr_29, tr_30 = :tr_30, tr_31 = :tr_31, tr_32 = :tr_32, tr_33 = :tr_33, tr_34 = :tr_34, tr_35 = :tr_35, tr_36 = :tr_36, tr_37 = :tr_37, tr_38 = :tr_38, tr_39 = :tr_39, tr_40 = :tr_40, tr_41 = :tr_41, tr_42 = :tr_42, tr_43 = :tr_43, tr_44 = :tr_44, tr_45 = :tr_45, tr_46 = :tr_46, tr_47 = :tr_47, tr_48 = :tr_48, tr_49 = :tr_49, tr_50 = :tr_50, tr_51 = :tr_51, tr_52 = :tr_52, tr_79 = :tr_79, tr_80 = :tr_80, tr_81 = :tr_81, tr_82 = :tr_82, tr_83 = :tr_83, tr_84 = :tr_84, tr_85 = :tr_85, tr_86 = :tr_86, tr_87 = :tr_87, tr_88 = :tr_88, tr_89 = :tr_89, tr_90 = :tr_90, tr_91 = :tr_91, tr_92 = :tr_92, tr_93 = :tr_93, tr_94 = :tr_94, tr_95 = :tr_95, tr_96 = :tr_96, tr_97 = :tr_97, tr_98 = :tr_98, tr_99 = :tr_99, tr_100 = :tr_100, tr_101 = :tr_101, tr_102 = :tr_102, tr_103 = :tr_103, tr_104 = :tr_104, tr_105 = :tr_105, tr_106 = :tr_106, tr_107 = :tr_107, tr_108 = :tr_108, tr_109 = :tr_109, tr_110 = :tr_110, tr_111 = :tr_111, tr_112 = :tr_112, tr_113 = :tr_113, tr_114 = :tr_114, tr_115 = :tr_115, tr_116 = :tr_116, tr_117 = :tr_117, tr_118 = :tr_118, tr_119 = :tr_119, tr_120 = :tr_120, tr_121 = :tr_121, tr_122 = :tr_122, tr_123 = :tr_123, tr_124 = :tr_124, tr_125 = :tr_125, tr_126 = :tr_126, tr_127 = :tr_127, tr_128 = :tr_128, tr_129 = :tr_129, tr_130 = :tr_130, tr_131 = :tr_131, tr_132 = :tr_132, tr_133 = :tr_133, tr_134 = :tr_134, tr_135 = :tr_135, tr_136 = :tr_136, tr_137 = :tr_137, tr_138 = :tr_138, tr_139 = :tr_139, tr_140 = :tr_140, tr_141 = :tr_141, tr_142 = :tr_142, tr_143 = :tr_143, tr_144 = :tr_144, tr_145 = :tr_145, tr_146 = :tr_146, tr_147 = :tr_147, tr_148 = :tr_148, tr_149 = :tr_149, tr_150 = :tr_150,  tr_151 = :tr_151, tr_152 = :tr_152, tr_153 = :tr_153, tr_154 = :tr_154, tr_155 = :tr_155, tr_156 = :tr_156, tr_157 = :tr_157, tr_158 = :tr_158, tr_159 = :tr_159, tr_160 = :tr_160, tr_161 = :tr_161, tr_162 = :tr_162, tr_163 = :tr_163, tr_164 = :tr_164, tr_165 = :tr_165, tr_166 = :tr_166, tr_167 = :tr_167, tr_168 = :tr_168, tr_169 = :tr_169, tr_170 = :tr_170, tr_171 = :tr_171, tr_172 = :tr_172, tr_173 = :tr_173, tr_174 = :tr_174, tr_175 = :tr_175, tr_176 = :tr_176, tr_177 = :tr_177, tr_178 = :tr_178, tr_179 = :tr_179, tr_180 = :tr_180, tr_181 = :tr_181, tr_182 = :tr_182, tr_183 = :tr_183, tr_184 = :tr_184, tr_185 = :tr_185, tr_186 = :tr_186, tr_187 = :tr_187, tr_188 = :tr_188, tr_189 = :tr_189, tr_190 = :tr_190, tr_191 = :tr_191, tr_192 = :tr_192, tr_193 = :tr_193, tr_194 = :tr_194, tr_195 = :tr_195, tr_196 = :tr_196, tr_197 = :tr_197, tr_198 = :tr_198, tr_199 = :tr_199, tr_200 = :tr_200
	");

	$statment->execute(array(':tr_maintenancepage' => $tr_maintenancepage, ':tr_maintenancetitle' => $tr_maintenancetitle, ':tr_maintenancesub' => $tr_maintenancesub, ':tr_profilepage' => $tr_profilepage, ':tr_signinpage' => $tr_signinpage, ':tr_signuppage' => $tr_signuppage, ':tr_resetpage' => $tr_resetpage, ':tr_forgotpage' => $tr_forgotpage, ':tr_termsandconds' => $tr_termsandconds, ':tr_aboutus' => $tr_aboutus, ':tr_eptitle' => $tr_eptitle, ':tr_epsubtitle' => $tr_epsubtitle, ':tr_eptagline' => $tr_eptagline, ':tr_epbutton' => $tr_epbutton, ':tr_1' => $tr_1, ':tr_2' => $tr_2, ':tr_3' => $tr_3, ':tr_4' => $tr_4, ':tr_5' => $tr_5, ':tr_6' => $tr_6, ':tr_7' => $tr_7, ':tr_8' => $tr_8, ':tr_9' => $tr_9, ':tr_10' => $tr_10, ':tr_11' => $tr_11, ':tr_12' => $tr_12, ':tr_13' => $tr_13, ':tr_14' => $tr_14, ':tr_15' => $tr_15, ':tr_16' => $tr_16, ':tr_17' => $tr_17, ':tr_18' => $tr_18, ':tr_19' => $tr_19, ':tr_20' => $tr_20, ':tr_21' => $tr_21, ':tr_22' => $tr_22, ':tr_23' => $tr_23, ':tr_24' => $tr_24, ':tr_25' => $tr_25, ':tr_26' => $tr_26, ':tr_27' => $tr_27, ':tr_28' => $tr_28, ':tr_29' => $tr_29, ':tr_30' => $tr_30, ':tr_31' => $tr_31, ':tr_32' => $tr_32, ':tr_33' => $tr_33, ':tr_34' => $tr_34, ':tr_35' => $tr_35, ':tr_36' => $tr_36, ':tr_37' => $tr_37, ':tr_38' => $tr_38, ':tr_39' => $tr_39, ':tr_40' => $tr_40, ':tr_41' => $tr_41, ':tr_42' => $tr_42, ':tr_43' => $tr_43, ':tr_44' => $tr_44, ':tr_45' => $tr_45, ':tr_46' => $tr_46, ':tr_47' => $tr_47, ':tr_48' => $tr_48, ':tr_49' => $tr_49, ':tr_50' => $tr_50, ':tr_51' => $tr_51, ':tr_52' => $tr_52, ':tr_79' => $tr_79, ':tr_80' => $tr_80, ':tr_81' => $tr_81, ':tr_82' => $tr_82, ':tr_83' => $tr_83, ':tr_84' => $tr_84, ':tr_85' => $tr_85, ':tr_86' => $tr_86, ':tr_87' => $tr_87, ':tr_88' => $tr_88, ':tr_89' => $tr_89, ':tr_90' => $tr_90, ':tr_91' => $tr_91, ':tr_92' => $tr_92, ':tr_93' => $tr_93, ':tr_94' => $tr_94, ':tr_95' => $tr_95, ':tr_96' => $tr_96, ':tr_97' => $tr_97, ':tr_98' => $tr_98, ':tr_99' => $tr_99, ':tr_100' => $tr_100, ':tr_101' => $tr_101, ':tr_102' => $tr_102, ':tr_103' => $tr_103, ':tr_104' => $tr_104, ':tr_105' => $tr_105, ':tr_106' => $tr_106, ':tr_107' => $tr_107, ':tr_108' => $tr_108, ':tr_109' => $tr_109, ':tr_110' => $tr_110, ':tr_111' => $tr_111, ':tr_112' => $tr_112, ':tr_113' => $tr_113, ':tr_114' => $tr_114, ':tr_115' => $tr_115, ':tr_116' => $tr_116, ':tr_117' => $tr_117, ':tr_118' => $tr_118, ':tr_119' => $tr_119, ':tr_120' => $tr_120, ':tr_121' => $tr_121, ':tr_122' => $tr_122, ':tr_123' => $tr_123, ':tr_124' => $tr_124, ':tr_125' => $tr_125, ':tr_126' => $tr_126, ':tr_127' => $tr_127, ':tr_128' => $tr_128, ':tr_129' => $tr_129, ':tr_130' => $tr_130, ':tr_131' => $tr_131, ':tr_132' => $tr_132, ':tr_133' => $tr_133, ':tr_134' => $tr_134, ':tr_135' => $tr_135, ':tr_136' => $tr_136, ':tr_137' => $tr_137, ':tr_138' => $tr_138, ':tr_139' => $tr_139, ':tr_140' => $tr_140, ':tr_141' => $tr_141, ':tr_142' => $tr_142, ':tr_143' => $tr_143, ':tr_144' => $tr_144, ':tr_145' => $tr_145, ':tr_146' => $tr_146, ':tr_147' => $tr_147, ':tr_148' => $tr_148, ':tr_149' => $tr_149, ':tr_150' => $tr_150, ':tr_151' => $tr_151, ':tr_152' => $tr_152, ':tr_153' => $tr_153, ':tr_154' => $tr_154, ':tr_155' => $tr_155, ':tr_156' => $tr_156, ':tr_157' => $tr_157, ':tr_158' => $tr_158, ':tr_159' => $tr_159, ':tr_160' => $tr_160, ':tr_161' => $tr_161, ':tr_162' => $tr_162, ':tr_163' => $tr_163, ':tr_164' => $tr_164, ':tr_165' => $tr_165, ':tr_166' => $tr_166, ':tr_167' => $tr_167, ':tr_168' => $tr_168, ':tr_169' => $tr_169, ':tr_170' => $tr_170, ':tr_171' => $tr_171, ':tr_172' => $tr_172, ':tr_173' => $tr_173, ':tr_174' => $tr_174, ':tr_175' => $tr_175, ':tr_176' => $tr_176, ':tr_177' => $tr_177, ':tr_178' => $tr_178, ':tr_179' => $tr_179, ':tr_180' => $tr_180, ':tr_181' => $tr_181, ':tr_182' => $tr_182, ':tr_183' => $tr_183, ':tr_184' => $tr_184, ':tr_185' => $tr_185, ':tr_186' => $tr_186, ':tr_187' => $tr_187, ':tr_188' => $tr_188, ':tr_189' => $tr_189, ':tr_190' => $tr_190, ':tr_191' => $tr_191, ':tr_192' => $tr_192, ':tr_193' => $tr_193, ':tr_194' => $tr_194, ':tr_195' => $tr_195, ':tr_196' => $tr_196, ':tr_197' => $tr_197, ':tr_198' => $tr_198, ':tr_199' => $tr_199, ':tr_200' => $tr_200));
}

}elseif($check_access['user_role'] == 2){

	require '../views/denied.view.php';
	
}else{
	
	header('Location:'.SITE_URL);
}

    
}else {
		header('Location: ./login.php');		
		}


?>