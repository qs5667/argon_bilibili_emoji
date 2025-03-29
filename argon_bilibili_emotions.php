<?php
/*
 * Plugin Name: Argon Emoji Bilibili
 * Plugin URI:  https://github.com/qs5667/argon_bilibili_emoji
 * Text Domain: argon-emoji-bilibili
 * Domain Path: /languages
 * Description: Argon 主题的 bilibili 表情包
 * Version:     1.1.0
 * Author:      Moxiaoban
 * Author URI:  https://www.memxb.top
 * License:     GNU General Public License v3.0
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

class Argon_Bilibili_Emoji {
    // Plugin version
    const VERSION = '1.1.0';
    
    // Singleton instance
    private static $instance = null;
    
    // Assets directory URL
    private $assets_url;
    
    /**
     * Constructor
     */
    private function __construct() {
        $this->assets_url = plugin_dir_url(__FILE__) . 'assets/';
        
        // Register hooks
        add_filter('argon_emotion_list', array($this, 'add_bilibili_emotions'));
        
        // Check if assets directory exists, if not create it
        $this->check_assets_directory();
    }
    
    /**
     * Get singleton instance
     */
    public static function get_instance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        
        return self::$instance;
    }
    
    /**
     * Check if assets directory exists and is writeable
     */
    private function check_assets_directory() {
        $assets_dir = plugin_dir_path(__FILE__) . 'assets';
        
        if (!file_exists($assets_dir)) {
            // Create directory if it doesn't exist
            if (!wp_mkdir_p($assets_dir)) {
                add_action('admin_notices', function() {
                    echo '<div class="error"><p>Argon Emoji Bilibili: ' . 
                         __('无法创建 assets 目录，请检查权限设置。', 'argon-emoji-bilibili') . 
                         '</p></div>';
                });
            }
        } elseif (!is_writable($assets_dir)) {
            // Show warning if directory is not writable
            add_action('admin_notices', function() {
                echo '<div class="warning"><p>Argon Emoji Bilibili: ' . 
                     __('assets 目录不可写，可能导致表情无法正常显示。', 'argon-emoji-bilibili') . 
                     '</p></div>';
            });
        }
    }
    
    /**
     * Add Bilibili emotions to Argon theme's emotion list
     */
    public function add_bilibili_emotions($emotionList) {
        // 基础表情组
        $emotionList[] = array(
            'groupname' => 'B站基础表情', 
            'list' => $this->get_basic_emotions()
        );

        // 节日表情组
        $emotionList[] = array(
            'groupname' => 'B站节日表情', 
            'list' => $this->get_festival_emotions()
        );

        // 游戏表情组
        $emotionList[] = array(
            'groupname' => 'B站游戏表情', 
            'list' => $this->get_game_emotions()
        );

        // 特殊活动表情组
        $emotionList[] = array(
            'groupname' => 'B站活动表情', 
            'list' => $this->get_activity_emotions()
        );

        return $emotionList;
    }
    
    /**
     * Helper function to create emotion entry
     */
    private function create_emotion($code, $filename) {
        return array(
            'type' => 'sticker',
            'code' => $code,
            'src' => $this->assets_url . $filename
        );
    }
    
    /**
     * Get basic emotions
     */
    private function get_basic_emotions() {
        $emotions = array();
        
        $emotion_data = array(
            'doge' => 'doge.png',
            'ok' => 'OK.png',
            'aojiao' => '傲娇.png',
            'chigua' => '吃瓜.png',
            'ciya' => '呲牙.png',
            'dacall' => '打call.png',
            'daku' => '大哭.png',
            'daxiao' => '大笑.png',
            'dai' => '呆.png',
            'dianzan' => '点赞.png',
            'tiaopi' => '调皮.png',
            'dudu' => '嘟嘟.png',
            'fanbaiyan' => '翻白眼.png',
            'fendou' => '奋斗.png',
            'ganga' => '尴尬.png',
            'geixinxin' => '给心心.png',
            'guzhang' => '鼓掌.png',
            'guaiwole' => '怪我咯.png',
            'guile' => '跪了.png',
            'haqian' => '哈欠.png',
            'haha' => '哈哈.png',
            'huaji' => '滑稽.png',
            'jitui' => '鸡腿.png',
            'jiayou' => '加油.png',
            'jianxiao' => '奸笑.png',
            'jinli' => '锦鲤.png',
            'jingxi' => '惊喜.png',
            'jingya' => '惊讶.png',
            'haipa' => '害羞.png',
            'koubi' => '抠鼻.png',
            'layanjing' => '辣眼睛.png',
            'lianhong' => '脸红.png',
            'leng' => '冷.png',
            'liulei' => '哭泣.png',
            'miantian' => '妙啊.png',
            'miaomiao' => '喜欢.png',
            'sikao' => '思考.png',
            'touxiao' => '偷笑.png',
            'tuxue' => '吐.png',
            'weiqu' => '委屈.png',
            'weixiao' => '微笑.png',
            'wunai' => '无语.png',
            'xiaoku' => '笑哭.png',
            'xieyanxiao' => '歪嘴.png',
            'yinxian' => '阴险.png',
            'yiwen' => '疑惑.png'
        );
        
        foreach ($emotion_data as $code => $filename) {
            $emotions[] = $this->create_emotion($code, $filename);
        }
        
        return $emotions;
    }
    
    /**
     * Get festival emotions
     */
    private function get_festival_emotions() {
        $emotions = array();
        
        $emotion_data = array(
            'doge-shengdan' => 'doge-圣诞.png',
            'doge-chunjie' => 'doge_春节.png',
            'doge-yurenjie' => 'doge_愚人节.png',
            'ok-shengdan' => 'OK-圣诞.png',
            'ok-chunjie' => 'OK_春节.png',
            'ok-yurenjie' => 'OK_愚人节.png',
            'chigua-shengdan' => '吃瓜-圣诞.png',
            'chigua-chunjie' => '吃瓜_春节.png',
            'chigua-yurenjie' => '吃瓜_愚人节.png',
            'ciya-shengdan' => '呲牙-圣诞.png',
            'ciya-chunjie' => '呲牙_春节.png',
            'ciya-yurenjie' => '呲牙_愚人节.png',
            'huaji-shengdan' => '滑稽-圣诞.png',
            'huaji-chunjie' => '滑稽_春节.png',
            'huaji-yurenjie' => '滑稽_愚人节.png',
            'fu' => '福.png',
            'fudaole' => '福到了.png',
            'hunan' => '虎年.png',
            'zongzi' => '粽子.png',
            'tangyuan' => '汤圆.png',
            'xueheren' => '雪容融.png',
            'yuebing' => '月饼.png',
            'niunian' => '牛年.png',
            'xuehua' => '雪花.png'
        );
        
        foreach ($emotion_data as $code => $filename) {
            $emotions[] = $this->create_emotion($code, $filename);
        }
        
        return $emotions;
    }
    
    /**
     * Get game emotions
     */
    private function get_game_emotions() {
        $emotions = array();
        
        $emotion_data = array(
            'aobi-jizhua' => '奥比岛_击爪.png',
            'aobi-dianzan' => '奥比岛_点赞.png',
            'aobi-banzhuang' => '奥比岛_搬砖.png',
            'aobi-weiqu' => '奥比岛_委屈.png',
            'aobi-xihuan' => '奥比岛_喜欢.png',
            'luobo-baiyan' => '保卫萝卜-白眼.png',
            'luobo-bixin' => '保卫萝卜-笔芯.png',
            'luobo-kuku' => '保卫萝卜-哭哭.png',
            'luobo-wa' => '保卫萝卜-哇.png',
            'luobo-wenhao' => '保卫萝卜-问号.png',
            'woniu-gaoxing' => '最强蜗牛_高兴.png',
            'woniu-qifen' => '最强蜗牛_气愤.png',
            'woniu-shuadai' => '最强蜗牛_耍帅.png',
            'genshin-xixi' => '原神_诶嘿.png',
            'genshin-hecha' => '原神_喝茶.png',
            'genshin-heng' => '原神_哼.png',
            'genshin-en' => '原神_嗯.png',
            'genshin-shengqi' => '原神_生气.png',
            'genshin-wa' => '原神_哇.png',
            'mrfz-haha' => '明日方舟_W-哈哈.png',
            'mrfz-huang' => '明日方舟_煌-震撼.png',
            'mrfz-lindong' => '明日方舟_凛冬-生气.png',
            'mrfz-shuangye' => '明日方舟_霜叶-疑问.png',
            'kangong-chiji' => '坎公骑冠剑-吃鸡.png',
            'kangong-wuyu' => '坎公骑冠剑-无语.png',
            'kangong-zuanshi' => '坎公骑冠剑-钻石.png',
            'laigu-dz' => '来古-呆滞.png',
            'laigu-cs' => '来古-沉思.png',
            'laigu-zy' => '来古-注意.png',
            'laigu-yw' => '来古-疑问.png',
            'laigu-zd' => '来古-震撼.png'
        );
        
        foreach ($emotion_data as $code => $filename) {
            $emotions[] = $this->create_emotion($code, $filename);
        }
        
        return $emotions;
    }
    
    /**
     * Get activity emotions
     */
    private function get_activity_emotions() {
        $emotions = array();
        
        $emotion_data = array(
            '11zhounian' => '11周年.png',
            '12zhounian' => '12周年.png',
            '2020' => '2020.png',
            '2021' => '2021.png',
            '2022' => '2022.png',
            'wuwei-bushi' => '无悔华夏_不愧是你.png',
            'wuwei-chigua' => '无悔华夏_吃瓜.png',
            'wuwei-damy' => '无悔华夏_达咩.png',
            'wuwei-dianzan' => '无悔华夏_点赞.png',
            'wuwei-haoya' => '无悔华夏_好耶.png',
            'gaokao' => '高考加油.png',
            'wusi' => '五四百年.png',
            'jiayouwuhan' => '加油武汉.png',
            'damenpobaiyi' => '弹幕破百亿.png',
            'shuidao' => '水稻.png',
            'bingdundun' => '冰墩墩.png',
            'luotianyi' => '洛天依.png',
            'heihuan' => '黑洞.png',
            'kouzhao' => '口罩.png'
        );
        
        foreach ($emotion_data as $code => $filename) {
            $emotions[] = $this->create_emotion($code, $filename);
        }
        
        return $emotions;
    }
}

// Initialize the plugin
add_action('plugins_loaded', function() {
    Argon_Bilibili_Emoji::get_instance();
});

// Register activation hook
register_activation_hook(__FILE__, function() {
    // Create assets directory if it doesn't exist
    $assets_dir = plugin_dir_path(__FILE__) . 'assets';
    if (!file_exists($assets_dir)) {
        wp_mkdir_p($assets_dir);
    }
    
    // You could add copy default emoji images here if needed
});<?php
/*
 * Plugin Name: Argon Emoji Bilibili
 * Plugin URI:  https://github.com/qs5667/argon_bilibili_emoji
 * Text Domain: argon-emoji-bilibili
 * Domain Path: /languages
 * Description: Argon 主题的 bilibili 表情包
 * Version:     1.1.0
 * Author:      Moxiaoban
 * Author URI:  https://www.memxb.top
 * License:     GNU General Public License v3.0
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

class Argon_Bilibili_Emoji {
    // Plugin version
    const VERSION = '1.1.0';
    
    // Singleton instance
    private static $instance = null;
    
    // Assets directory URL
    private $assets_url;
    
    /**
     * Constructor
     */
    private function __construct() {
        $this->assets_url = plugin_dir_url(__FILE__) . 'assets/';
        
        // Register hooks
        add_filter('argon_emotion_list', array($this, 'add_bilibili_emotions'));
        
        // Check if assets directory exists, if not create it
        $this->check_assets_directory();
    }
    
    /**
     * Get singleton instance
     */
    public static function get_instance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        
        return self::$instance;
    }
    
    /**
     * Check if assets directory exists and is writeable
     */
    private function check_assets_directory() {
        $assets_dir = plugin_dir_path(__FILE__) . 'assets';
        
        if (!file_exists($assets_dir)) {
            // Create directory if it doesn't exist
            if (!wp_mkdir_p($assets_dir)) {
                add_action('admin_notices', function() {
                    echo '<div class="error"><p>Argon Emoji Bilibili: ' . 
                         __('无法创建 assets 目录，请检查权限设置。', 'argon-emoji-bilibili') . 
                         '</p></div>';
                });
            }
        } elseif (!is_writable($assets_dir)) {
            // Show warning if directory is not writable
            add_action('admin_notices', function() {
                echo '<div class="warning"><p>Argon Emoji Bilibili: ' . 
                     __('assets 目录不可写，可能导致表情无法正常显示。', 'argon-emoji-bilibili') . 
                     '</p></div>';
            });
        }
    }
    
    /**
     * Add Bilibili emotions to Argon theme's emotion list
     */
    public function add_bilibili_emotions($emotionList) {
        // 基础表情组
        $emotionList[] = array(
            'groupname' => 'B站基础表情', 
            'list' => $this->get_basic_emotions()
        );

        // 节日表情组
        $emotionList[] = array(
            'groupname' => 'B站节日表情', 
            'list' => $this->get_festival_emotions()
        );

        // 游戏表情组
        $emotionList[] = array(
            'groupname' => 'B站游戏表情', 
            'list' => $this->get_game_emotions()
        );

        // 特殊活动表情组
        $emotionList[] = array(
            'groupname' => 'B站活动表情', 
            'list' => $this->get_activity_emotions()
        );

        return $emotionList;
    }
    
    /**
     * Helper function to create emotion entry
     */
    private function create_emotion($code, $filename) {
        return array(
            'type' => 'sticker',
            'code' => $code,
            'src' => $this->assets_url . $filename
        );
    }
    
    /**
     * Get basic emotions
     */
    private function get_basic_emotions() {
        $emotions = array();
        
        $emotion_data = array(
            'doge' => 'doge.png',
            'ok' => 'OK.png',
            'aojiao' => '傲娇.png',
            'chigua' => '吃瓜.png',
            'ciya' => '呲牙.png',
            'dacall' => '打call.png',
            'daku' => '大哭.png',
            'daxiao' => '大笑.png',
            'dai' => '呆.png',
            'dianzan' => '点赞.png',
            'tiaopi' => '调皮.png',
            'dudu' => '嘟嘟.png',
            'fanbaiyan' => '翻白眼.png',
            'fendou' => '奋斗.png',
            'ganga' => '尴尬.png',
            'geixinxin' => '给心心.png',
            'guzhang' => '鼓掌.png',
            'guaiwole' => '怪我咯.png',
            'guile' => '跪了.png',
            'haqian' => '哈欠.png',
            'haha' => '哈哈.png',
            'huaji' => '滑稽.png',
            'jitui' => '鸡腿.png',
            'jiayou' => '加油.png',
            'jianxiao' => '奸笑.png',
            'jinli' => '锦鲤.png',
            'jingxi' => '惊喜.png',
            'jingya' => '惊讶.png',
            'haipa' => '害羞.png',
            'koubi' => '抠鼻.png',
            'layanjing' => '辣眼睛.png',
            'lianhong' => '脸红.png',
            'leng' => '冷.png',
            'liulei' => '哭泣.png',
            'miantian' => '妙啊.png',
            'miaomiao' => '喜欢.png',
            'sikao' => '思考.png',
            'touxiao' => '偷笑.png',
            'tuxue' => '吐.png',
            'weiqu' => '委屈.png',
            'weixiao' => '微笑.png',
            'wunai' => '无语.png',
            'xiaoku' => '笑哭.png',
            'xieyanxiao' => '歪嘴.png',
            'yinxian' => '阴险.png',
            'yiwen' => '疑惑.png'
        );
        
        foreach ($emotion_data as $code => $filename) {
            $emotions[] = $this->create_emotion($code, $filename);
        }
        
        return $emotions;
    }
    
    /**
     * Get festival emotions
     */
    private function get_festival_emotions() {
        $emotions = array();
        
        $emotion_data = array(
            'doge-shengdan' => 'doge-圣诞.png',
            'doge-chunjie' => 'doge_春节.png',
            'doge-yurenjie' => 'doge_愚人节.png',
            'ok-shengdan' => 'OK-圣诞.png',
            'ok-chunjie' => 'OK_春节.png',
            'ok-yurenjie' => 'OK_愚人节.png',
            'chigua-shengdan' => '吃瓜-圣诞.png',
            'chigua-chunjie' => '吃瓜_春节.png',
            'chigua-yurenjie' => '吃瓜_愚人节.png',
            'ciya-shengdan' => '呲牙-圣诞.png',
            'ciya-chunjie' => '呲牙_春节.png',
            'ciya-yurenjie' => '呲牙_愚人节.png',
            'huaji-shengdan' => '滑稽-圣诞.png',
            'huaji-chunjie' => '滑稽_春节.png',
            'huaji-yurenjie' => '滑稽_愚人节.png',
            'fu' => '福.png',
            'fudaole' => '福到了.png',
            'hunan' => '虎年.png',
            'zongzi' => '粽子.png',
            'tangyuan' => '汤圆.png',
            'xueheren' => '雪容融.png',
            'yuebing' => '月饼.png',
            'niunian' => '牛年.png',
            'xuehua' => '雪花.png'
        );
        
        foreach ($emotion_data as $code => $filename) {
            $emotions[] = $this->create_emotion($code, $filename);
        }
        
        return $emotions;
    }
    
    /**
     * Get game emotions
     */
    private function get_game_emotions() {
        $emotions = array();
        
        $emotion_data = array(
            'aobi-jizhua' => '奥比岛_击爪.png',
            'aobi-dianzan' => '奥比岛_点赞.png',
            'aobi-banzhuang' => '奥比岛_搬砖.png',
            'aobi-weiqu' => '奥比岛_委屈.png',
            'aobi-xihuan' => '奥比岛_喜欢.png',
            'luobo-baiyan' => '保卫萝卜-白眼.png',
            'luobo-bixin' => '保卫萝卜-笔芯.png',
            'luobo-kuku' => '保卫萝卜-哭哭.png',
            'luobo-wa' => '保卫萝卜-哇.png',
            'luobo-wenhao' => '保卫萝卜-问号.png',
            'woniu-gaoxing' => '最强蜗牛_高兴.png',
            'woniu-qifen' => '最强蜗牛_气愤.png',
            'woniu-shuadai' => '最强蜗牛_耍帅.png',
            'genshin-xixi' => '原神_诶嘿.png',
            'genshin-hecha' => '原神_喝茶.png',
            'genshin-heng' => '原神_哼.png',
            'genshin-en' => '原神_嗯.png',
            'genshin-shengqi' => '原神_生气.png',
            'genshin-wa' => '原神_哇.png',
            'mrfz-haha' => '明日方舟_W-哈哈.png',
            'mrfz-huang' => '明日方舟_煌-震撼.png',
            'mrfz-lindong' => '明日方舟_凛冬-生气.png',
            'mrfz-shuangye' => '明日方舟_霜叶-疑问.png',
            'kangong-chiji' => '坎公骑冠剑-吃鸡.png',
            'kangong-wuyu' => '坎公骑冠剑-无语.png',
            'kangong-zuanshi' => '坎公骑冠剑-钻石.png',
            'laigu-dz' => '来古-呆滞.png',
            'laigu-cs' => '来古-沉思.png',
            'laigu-zy' => '来古-注意.png',
            'laigu-yw' => '来古-疑问.png',
            'laigu-zd' => '来古-震撼.png'
        );
        
        foreach ($emotion_data as $code => $filename) {
            $emotions[] = $this->create_emotion($code, $filename);
        }
        
        return $emotions;
    }
    
    /**
     * Get activity emotions
     */
    private function get_activity_emotions() {
        $emotions = array();
        
        $emotion_data = array(
            '11zhounian' => '11周年.png',
            '12zhounian' => '12周年.png',
            '2020' => '2020.png',
            '2021' => '2021.png',
            '2022' => '2022.png',
            'wuwei-bushi' => '无悔华夏_不愧是你.png',
            'wuwei-chigua' => '无悔华夏_吃瓜.png',
            'wuwei-damy' => '无悔华夏_达咩.png',
            'wuwei-dianzan' => '无悔华夏_点赞.png',
            'wuwei-haoya' => '无悔华夏_好耶.png',
            'gaokao' => '高考加油.png',
            'wusi' => '五四百年.png',
            'jiayouwuhan' => '加油武汉.png',
            'damenpobaiyi' => '弹幕破百亿.png',
            'shuidao' => '水稻.png',
            'bingdundun' => '冰墩墩.png',
            'luotianyi' => '洛天依.png',
            'heihuan' => '黑洞.png',
            'kouzhao' => '口罩.png'
        );
        
        foreach ($emotion_data as $code => $filename) {
            $emotions[] = $this->create_emotion($code, $filename);
        }
        
        return $emotions;
    }
}

// Initialize the plugin
add_action('plugins_loaded', function() {
    Argon_Bilibili_Emoji::get_instance();
});

// Register activation hook
register_activation_hook(__FILE__, function() {
    // Create assets directory if it doesn't exist
    $assets_dir = plugin_dir_path(__FILE__) . 'assets';
    if (!file_exists($assets_dir)) {
        wp_mkdir_p($assets_dir);
    }
    
    // You could add copy default emoji images here if needed
});
