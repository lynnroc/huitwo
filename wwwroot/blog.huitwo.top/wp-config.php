<?php
/**
 * WordPress基础配置文件。
 *
 * 这个文件被安装程序用于自动生成wp-config.php配置文件，
 * 您可以不使用网站，您需要手动复制这个文件，
 * 并重命名为“wp-config.php”，然后填入相关信息。
 *
 * 本文件包含以下配置选项：
 *
 * * MySQL设置
 * * 密钥
 * * 数据库表名前缀
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/zh-cn:%E7%BC%96%E8%BE%91_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL 设置 - 具体信息来自您正在使用的主机 ** //
/** WordPress数据库的名称 */
define('DB_NAME', 'wordpress');

/** MySQL数据库用户名 */
define('DB_USER', 'root');

/** MySQL数据库密码 */
define('DB_PASSWORD', 'lynnroc');

/** MySQL主机 */
define('DB_HOST', 'localhost');

/** 创建数据表时默认的文字编码 */
define('DB_CHARSET', 'utf8mb4');

/** 数据库整理类型。如不确定请勿更改 */
define('DB_COLLATE', '');

/**#@+
 * 身份认证密钥与盐。
 *
 * 修改为任意独一无二的字串！
 * 或者直接访问{@link https://api.wordpress.org/secret-key/1.1/salt/
 * WordPress.org密钥生成服务}
 * 任何修改都会导致所有cookies失效，所有用户将必须重新登录。
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'PJntr.9l=5vNYgID4;ba?mJ|cYOki^/w#I8o,0&<tu~Yl&5BD5#vuE4i|7tY/^e7');
define('SECURE_AUTH_KEY',  '~i^GE NiX3h)/C+pHMpS*Xt,8S#Neb,cZd?y_0~ YJ$!v~s@Y0TWF!4@+`z#LnFj');
define('LOGGED_IN_KEY',    'dwBzXA/[}(AZBfI/=Eyi3OW* 63)tS@V72Y$fRYa!2X5u94lvEBF?afK#Mht[|V%');
define('NONCE_KEY',        'r=<g?tRa/t%ty%*lep/N:}--zYfMaL=<QZS?pT~6VU0,R{[I#%QtKoPK|dpwp5^q');
define('AUTH_SALT',        '@%>wc-Cp6%6fnuU}>q`25Rmn~_6-:%#DRZa[|trmks|s%]BtR37s39gGmoV6uGp:');
define('SECURE_AUTH_SALT', ')OD*$2Cc;]H4/0iMbxp_Ot-3JXafodM,azv_&Cz7KU;0k>U4eb v{<d>+>$&Nx<A');
define('LOGGED_IN_SALT',   '!**qa4n5lc<%3J3&Z[p-cA}n|?]C)x>k^G!da9)ZC;sTox;xF2h[@aY_(QtlrdLp');
define('NONCE_SALT',       '_jU`JIY*f``oUW|!GQ~{zedI?,_w@flI}2l5PzQTSD]5_/#uC&~U>0IV[0e+a9K,');

/**#@-*/

/**
 * WordPress数据表前缀。
 *
 * 如果您有在同一数据库内安装多个WordPress的需求，请为每个WordPress设置
 * 不同的数据表前缀。前缀名只能为数字、字母加下划线。
 */
$table_prefix  = 'wp_';

/**
 * 开发者专用：WordPress调试模式。
 *
 * 将这个值改为true，WordPress将显示所有用于开发的提示。
 * 强烈建议插件开发者在开发环境中启用WP_DEBUG。
 *
 * 要获取其他能用于调试的信息，请访问Codex。
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/**
 * zh_CN本地化设置：启用ICP备案号显示
 *
 * 可在设置→常规中修改。
 * 如需禁用，请移除或注释掉本行。
 */
define('WP_ZH_CN_ICP_NUM', true);

/* 好了！请不要再继续编辑。请保存本文件。使用愉快！ */

/** WordPress目录的绝对路径。 */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** 设置WordPress变量和包含文件。 */
require_once(ABSPATH . 'wp-settings.php');

// 新添加
define('FS_METHOD', "direct");
