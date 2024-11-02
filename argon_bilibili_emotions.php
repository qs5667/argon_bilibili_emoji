<?php
/*
 * Plugin Name: Argon Emoji Bilibili
 * Plugin URI:  https://github.com/qs5667/argon_bilibili_emoji
 * Text Domain: Argon Emoji Bilibili
 * Domain Path: /languages
 * Description: Argon 主题的bilibili表情包
 * Version:     1.0.0
 * Author:      Moxiaoban
 * Author URI:  https://www.mebk.top/
 * License:     GNU General Public License v3.0
 */

if (!defined('ABSPATH')) {
    exit;
}

// 定义插件目录路径常量
define('BILI_EMOJI_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('BILI_EMOJI_PLUGIN_URL', plugin_dir_url(__FILE__));

function add_bilibili_emotions($emotionList){
    // 使用定义好的常量来获取插件目录URL
    $assets_dir = BILI_EMOJI_PLUGIN_URL . 'assets/';
    
    // 基础表情组
    array_push(
        $emotionList,
        array(
            'groupname' => 'B站基础表情',
            'list' => array(
                array('type' => 'sticker', 'code' => 'doge', 'src' => $assets_dir . 'doge.png'),
                array('type' => 'sticker', 'code' => 'ok', 'src' => $assets_dir . 'OK.png'),
                array('type' => 'sticker', 'code' => 'aojiao', 'src' => $assets_dir . '傲娇.png'),
                array('type' => 'sticker', 'code' => 'chigua', 'src' => $assets_dir . '吃瓜.png'),
                array('type' => 'sticker', 'code' => 'biya', 'src' => $assets_dir . '毗牙.png'),
                array('type' => 'sticker', 'code' => 'dacall', 'src' => $assets_dir . '打 call.png'),
                array('type' => 'sticker', 'code' => 'daku', 'src' => $assets_dir . '大哭.png'),
                array('type' => 'sticker', 'code' => 'daxiao', 'src' => $assets_dir . '大笑.png'),
                array('type' => 'sticker', 'code' => 'dai', 'src' => $assets_dir . '呆.png'),
                array('type' => 'sticker', 'code' => 'dianzan', 'src' => $assets_dir . '点赞.png'),
                array('type' => 'sticker', 'code' => 'tiaopi', 'src' => $assets_dir . '调皮.png'),
                array('type' => 'sticker', 'code' => 'dudu', 'src' => $assets_dir . '嘟嘟.png'),
                array('type' => 'sticker', 'code' => 'fanbaiyan', 'src' => $assets_dir . '翻白眼.png'),
                array('type' => 'sticker', 'code' => 'fendou', 'src' => $assets_dir . '奋斗.png'),
                array('type' => 'sticker', 'code' => 'ganga', 'src' => $assets_dir . '尴尬.png'),
                array('type' => 'sticker', 'code' => 'geixinxin', 'src' => $assets_dir . '给心心.png'),
                array('type' => 'sticker', 'code' => 'guzhang', 'src' => $assets_dir . '鼓掌.png'),
                array('type' => 'sticker', 'code' => 'guaiwole', 'src' => $assets_dir . '怪我咯.png'),
                array('type' => 'sticker', 'code' => 'guile', 'src' => $assets_dir . '跪了.png'),
                array('type' => 'sticker', 'code' => 'haqian', 'src' => $assets_dir . '哈欠.png'),
                array('type' => 'sticker', 'code' => 'haha', 'src' => $assets_dir . '哈哈.png'),
                array('type' => 'sticker', 'code' => 'huaji', 'src' => $assets_dir . '滑稽.png'),
                array('type' => 'sticker', 'code' => 'jitui', 'src' => $assets_dir . '鸡腿.png'),
                array('type' => 'sticker', 'code' => 'jiayou', 'src' => $assets_dir . '加油.png'),
                array('type' => 'sticker', 'code' => 'jianxiao', 'src' => $assets_dir . '奸笑.png'),
                array('type' => 'sticker', 'code' => 'jinli', 'src' => $assets_dir . '锦鲤.png'),
                array('type' => 'sticker', 'code' => 'jingxi', 'src' => $assets_dir . '惊喜.png'),
                array('type' => 'sticker', 'code' => 'jingya', 'src' => $assets_dir . '惊讶.png'),
                array('type' => 'sticker', 'code' => 'haipa', 'src' => $assets_dir . '害怕.png'),
                array('type' => 'sticker', 'code' => 'koubi', 'src' => $assets_dir . '抠鼻.png'),
                array('type' => 'sticker', 'code' => 'layanjing', 'src' => $assets_dir . '辣眼睛.png'),
                array('type' => 'sticker', 'code' => 'lianhong', 'src' => $assets_dir . '脸红.png'),
                array('type' => 'sticker', 'code' => 'leng', 'src' => $assets_dir . '冷.png')
            )
        )
    );

    // 节日表情组
    array_push(
        $emotionList,
        array(
            'groupname' => 'B站节日表情',
            'list' => array(
                array('type' => 'sticker', 'code' => 'doge-shengdan', 'src' => $assets_dir . 'doge-圣诞.png'),
                array('type' => 'sticker', 'code' => 'doge-chunjie', 'src' => $assets_dir . 'doge_春节.png'),
                array('type' => 'sticker', 'code' => 'doge-yurenjie', 'src' => $assets_dir . 'doge_愚人节.png'),
                array('type' => 'sticker', 'code' => 'ok-shengdan', 'src' => $assets_dir . 'OK-圣诞.png'),
                array('type' => 'sticker', 'code' => 'ok-chunjie', 'src' => $assets_dir . 'OK_春节.png'),
                array('type' => 'sticker', 'code' => 'ok-yurenjie', 'src' => $assets_dir . 'OK_愚人节.png'),
                array('type' => 'sticker', 'code' => 'chigua-shengdan', 'src' => $assets_dir . '吃瓜一圣诞.png'),
                array('type' => 'sticker', 'code' => 'chigua-chunjie', 'src' => $assets_dir . '吃瓜_春节.png'),
                array('type' => 'sticker', 'code' => 'chigua-yurenjie', 'src' => $assets_dir . '吃瓜—愚人节.png'),
                array('type' => 'sticker', 'code' => 'biya-shengdan', 'src' => $assets_dir . '毗牙-圣诞.png'),
                array('type' => 'sticker', 'code' => 'biya-chunjie', 'src' => $assets_dir . '毗牙_春节.png'),
                array('type' => 'sticker', 'code' => 'biya-yurenjie', 'src' => $assets_dir . '毗牙-愚人节.png'),
                array('type' => 'sticker', 'code' => 'huaji-shengdan', 'src' => $assets_dir . '滑稽-圣诞.png'),
                array('type' => 'sticker', 'code' => 'huaji-chunjie', 'src' => $assets_dir . '滑稽一春节.png'),
                array('type' => 'sticker', 'code' => 'huaji-yurenjie', 'src' => $assets_dir . '滑稽一愚人节.png'),
                array('type' => 'sticker', 'code' => 'fu', 'src' =>                array('type' => 'sticker', 'code' => 'fu', 'src' => $assets_dir . '福.png'),
                array('type' => 'sticker', 'code' => 'fudaole', 'src' => $assets_dir . '福到了.png'),
                array('type' => 'sticker', 'code' => 'hunan', 'src' => $assets_dir . '虎年.png'),
                array('type' => 'sticker', 'code' => 'zongzi', 'src' => $assets_dir . '粽子.png'),
                array('type' => 'sticker', 'code' => 'tangyuan', 'src' => $assets_dir . '汤圆.png'),
                array('type' => 'sticker', 'code' => 'xueheren', 'src' => $assets_dir . '雪容融.png'),
                array('type' => 'sticker', 'code' => 'yuebing', 'src' => $assets_dir . '月饼.png')
            )
        )
    );

    // 游戏表情组
    array_push(
        $emotionList,
        array(
            'groupname' => 'B站游戏表情',
            'list' => array(
                array('type' => 'sticker', 'code' => 'aobi-jizhua', 'src' => $assets_dir . '奥比岛_击爪.png'),
                array('type' => 'sticker', 'code' => 'aobi-dianzan', 'src' => $assets_dir . '奥比岛—点赞.png'),
                array('type' => 'sticker', 'code' => 'aobi-banzhuang', 'src' => $assets_dir . '奥比岛一搬砖.png'),
                array('type' => 'sticker', 'code' => 'aobi-weiqu', 'src' => $assets_dir . '奥比岛-委屈.png'),
                array('type' => 'sticker', 'code' => 'aobi-xihuan', 'src' => $assets_dir . '奥比岛-喜欢.png'),
                array('type' => 'sticker', 'code' => 'luobo-baiyan', 'src' => $assets_dir . '保卫萝卜-白眼.png'),
                array('type' => 'sticker', 'code' => 'luobo-bixin', 'src' => $assets_dir . '保卫萝卜-笔芯.png'),
                array('type' => 'sticker', 'code' => 'luobo-kuku', 'src' => $assets_dir . '保卫萝卜-哭哭.png'),
                array('type' => 'sticker', 'code' => 'woniu-gaoxing', 'src' => $assets_dir . '最强蜗牛一高兴.png'),
                array('type' => 'sticker', 'code' => 'woniu-qifen', 'src' => $assets_dir . '最强蜗牛一气愤.png'),
                array('type' => 'sticker', 'code' => 'woniu-shuadai', 'src' => $assets_dir . '最强蜗牛一耍帅.png'),
                array('type' => 'sticker', 'code' => 'genshin-xixi', 'src' => $assets_dir . '原神》矣嘿.png'),
                array('type' => 'sticker', 'code' => 'genshin-hecha', 'src' => $assets_dir . '原神一喝茶.png'),
                array('type' => 'sticker', 'code' => 'genshin-heng', 'src' => $assets_dir . '原神一哼.png'),
                array('type' => 'sticker', 'code' => 'genshin-en', 'src' => $assets_dir . '原神一嗯.png'),
                array('type' => 'sticker', 'code' => 'genshin-shengqi', 'src' => $assets_dir . '原神一生气.png'),
                array('type' => 'sticker', 'code' => 'mrfz-haha', 'src' => $assets_dir . '碇氟明日方舟-w-哈哈.png'),
                array('type' => 'sticker', 'code' => 'mrfz-huang', 'src' => $assets_dir . '明日方舟一煌-震撼.png'),
                array('type' => 'sticker', 'code' => 'mrfz-lindong', 'src' => $assets_dir . '明日方舟一凛冬-生气.png'),
                array('type' => 'sticker', 'code' => 'mrfz-shuangye', 'src' => $assets_dir . '明日方舟一霜叶-疑问.png'),
                array('type' => 'sticker', 'code' => 'kangong-chiji', 'src' => $assets_dir . '坎公骑冠剑-吃鸡.png'),
                array('type' => 'sticker', 'code' => 'kangong-wuyu', 'src' => $assets_dir . '坎公骑冠剑-无语.png'),
                array('type' => 'sticker', 'code' => 'kangong-zuanshi', 'src' => $assets_dir . '坎公骑冠剑-钻石.png')
            )
        )
    );

    // 特殊活动表情组
    array_push(
        $emotionList,
        array(
            'groupname' => 'B站活动表情',
            'list' => array(
                array('type' => 'sticker', 'code' => '11zhounian', 'src' => $assets_dir . '11周年.png'),
                array('type' => 'sticker', 'code' => '12zhounian', 'src' => $assets_dir . '12周年.png'),
                array('type' => 'sticker', 'code' => '2020', 'src' => $assets_dir . '2020.png'),
                array('type' => 'sticker', 'code' => '2021', 'src' => $assets_dir . '2021.png'),
                array('type' => 'sticker', 'code' => '2022', 'src' => $assets_dir . '2022.png'),
                array('type' => 'sticker', 'code' => 'wuwei-bushi', 'src' => $assets_dir . '无悔华夏一不愧是你.png'),
                array('type' => 'sticker', 'code' => 'wuwei-chigua', 'src' => $assets_dir . '无悔华夏一吃瓜.png'),
                array('type' => 'sticker', 'code' => 'wuwei-daqun', 'src' => $assets_dir . '丁丁无悔华夏-达群.png'),
                array('type' => 'sticker', 'code' => 'wuwei-dianzan', 'src' => $assets_dir . '传令无悔华夏-点赞.png'),
                array('type' => 'sticker', 'code' => 'wuwei-haoya', 'src' => $assets_dir . '无悔华夏一好耶.png'),
                array('type' => 'sticker', 'code' => 'gaokao', 'src' => $assets_dir . '高考加油.png'),
                array('type' => 'sticker', 'code' => 'wusi', 'src' => $assets_dir . '五四百年.png'),
                array('type' => 'sticker', 'code' => 'jiayouwuhan', 'src' => $assets_dir . '加油武汉.png'),
                array('type' => 'sticker', 'code' => 'damenpobaiyi', 'src' => $assets_dir . '弹幕破百亿.png'),
                array('type' => 'sticker', 'code' => 'shuidao', 'src' => $assets_dir . '水稻.png')
            )
        )
    );

    return $emotionList;
}
add_filter('argon_emotion_list', 'add_bilibili_emotions');