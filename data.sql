drop database if exists trip365;
create database trip365;
use trip365;
create table if not exists `admin_users`
(
  `id`               INT UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '主键',
  `admin_id`         VARCHAR(50)  NOT NULL COMMENT '管理员id',
  `account`          VARCHAR(50)  NOT NULL COMMENT '管理员账号',
  `password`         VARCHAR(255) NOT NULL COMMENT '管理员密码',
  `full_name`        VARCHAR(50)  NULL COMMENT '管理员姓名',
  `nick_name`        VARCHAR(50)  NULL COMMENT '管理员昵称',
  `avatar`           VARCHAR(255) NULL COMMENT '管理员头像',
  `gender`           TINYINT      NULL COMMENT '性别(0女，1男)',
  `mobile`           varchar(50)  NULL COMMENT '手机',
  `phone`            VARCHAR(50)  NULL COMMENT '固定电话',
  `email`            VARCHAR(255) NULL COMMENT '电子邮件',
  `qq`               VARCHAR(50)  NULL COMMENT 'qq号码',
  `status`           TINYINT      NULL DEFAULT '1' COMMENT '状态(0禁用,1正常,2待审核)',
  `login_times`      INT UNSIGNED NULL DEFAULT '0' COMMENT '登录次数',
  `login_time`       DATETIME     NULL COMMENT '登录时间',
  `last_login_time`  DATETIME     NULL COMMENT '上次登录时间',
  `ip`               VARCHAR(255) NULL COMMENT '登录ip地址',
  `secret`           VARCHAR(255) NULL COMMENT '加密密钥',
  `create_user_id`   VARCHAR(50)  NULL COMMENT '创建用户id',
  `create_user_name` VARCHAR(50)  NULL COMMENT '创建用户姓名',
  `modify_user_id`   VARCHAR(50)  NULL COMMENT '修改用户id',
  `modify_user_name` VARCHAR(50)  NULL COMMENT '修改用户姓名',
  `create_time`      DATETIME     NULL COMMENT '创建时间',
  `update_time`      DATETIME     NULL COMMENT '修改时间',
  `delete_time`      DATETIME     NULL COMMENT '删除时间',
  PRIMARY KEY (`id`),
  UNIQUE INDEX (`admin_id`),
  UNIQUE INDEX (`account`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4;
insert into `admin_users`(admin_id, account, password)
values ('admin', 'admin', '53iCojw7PT176');

CREATE TABLE IF NOT EXISTS `assets`
(
  `id`             bigint(20) UNSIGNED                                           NOT NULL AUTO_INCREMENT,
  `user_id`        bigint(20) UNSIGNED                                           NOT NULL COMMENT '用户id',
  `file_size`      bigint(20) UNSIGNED                                           NOT NULL DEFAULT '0' COMMENT '文件大小,单位B',
  `create_time`    DATETIME                                                      NULL COMMENT '上传时间',
  `status`         tinyint(3) UNSIGNED                                           NOT NULL DEFAULT '1' COMMENT '状态;1:可用,0:不可用',
  `download_times` int(10) UNSIGNED                                              NOT NULL DEFAULT '0' COMMENT '下载次数',
  `file_key`       varchar(64) CHARACTER SET utf8                                NOT NULL DEFAULT '' COMMENT '文件惟一码',
  `filename`       varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '文件名',
  `original_name`  varchar(100)                                                  NOT NULL DEFAULT '' COMMENT '原文件名',
  `file_path`      varchar(100) CHARACTER SET utf8                               NOT NULL DEFAULT '' COMMENT '文件路径,相对于upload目录,可以为url',
  `file_md5`       varchar(32) CHARACTER SET utf8                                NOT NULL DEFAULT '' COMMENT '文件md5值',
  `file_sha1`      varchar(40) CHARACTER SET utf8                                NOT NULL DEFAULT '',
  `suffix`         varchar(10)                                                   NOT NULL DEFAULT '' COMMENT '文件后缀名,不包括点',
  `more`           text COMMENT '其它详细信息,JSON格式',
  PRIMARY KEY (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4 COMMENT ='资源表';

CREATE TABLE IF NOT EXISTS `articles`
(
  `id`               bigint(20) UNSIGNED                                           NOT NULL AUTO_INCREMENT,
  `parent_id`        bigint(20) UNSIGNED                                           NOT NULL DEFAULT '0' COMMENT '父级id',
  `category_id`      int UNSIGNED                                                  NOT NULL DEFAULT 0 COMMENT '类别id',
  `article_type`     tinyint(3) UNSIGNED                                           NOT NULL DEFAULT '1' COMMENT '类型,1:文章;2:页面',
  `article_format`   tinyint(3) UNSIGNED                                           NOT NULL DEFAULT '1' COMMENT '内容格式;1:html;2:md',
  `user_id`          bigint(20) UNSIGNED                                           NOT NULL COMMENT '文章作者id',
  `article_status`   tinyint(3) UNSIGNED                                           NOT NULL DEFAULT '1' COMMENT '状态;1:已发布;0:未发布;',
  `comment_status`   tinyint(3) UNSIGNED                                           NOT NULL DEFAULT '1' COMMENT '评论状态;1:允许;0:不允许',
  `is_top`           tinyint(3) UNSIGNED                                           NOT NULL DEFAULT '0' COMMENT '是否置顶;1:置顶;0:不置顶',
  `recommended`      tinyint(3) UNSIGNED                                           NOT NULL DEFAULT '0' COMMENT '是否推荐;1:推荐;0:不推荐',
  `article_hits`     bigint(20) UNSIGNED                                           NOT NULL DEFAULT '0' COMMENT '查看数',
  `article_like`     bigint(20) UNSIGNED                                           NOT NULL DEFAULT '0' COMMENT '点赞数',
  `comment_count`    bigint(20) UNSIGNED                                           NOT NULL DEFAULT '0' COMMENT '评论数',
  `create_time`      DATETIME                                                      NULL COMMENT '创建时间',
  `update_time`      DATETIME                                                      NULL COMMENT '更新时间',
  `published_time`   DATETIME                                                      NULL COMMENT '发布时间',
  `delete_time`      DATETIME                                                      NULL COMMENT '删除时间',
  `title`            varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT 'post标题',
  `keywords`         varchar(150)                                                  NOT NULL DEFAULT '' COMMENT 'seo keywords',
  `excerpt`          varchar(500)                                                  NOT NULL DEFAULT '' COMMENT 'article摘要',
  `source`           varchar(150)                                                  NOT NULL DEFAULT '' COMMENT '转载文章的来源',
  `thumbnail_id`     VARCHAR(150)                                                  NOT NULL DEFAULT '' COMMENT '缩略图',
  `content`          text COMMENT '文章内容',
  `content_filtered` text COMMENT '处理过的文章内容',
  `audio_id`         varchar(150)                                                  NULL     DEFAULT '' COMMENT '音频id',
  `video_id`         varchar(150)                                                  NULL     DEFAULT '' COMMENT '视频id',
  `photo_id`         varchar(150)                                                  NULL     DEFAULT '' COMMENT '相册id',
  `file_id`          varchar(150)                                                  NULL     DEFAULT '' COMMENT '附件id',
  `sort`             bigint(20)                                                    NULL COMMENT '排序',
  `more`             text COMMENT '扩展属性;格式为json',
  PRIMARY KEY (`id`),
  KEY `type_status_date` (`article_type`, `article_status`, `create_time`, `id`),
  KEY `parent_id` (`parent_id`),
  KEY `user_id` (`user_id`),
  KEY `create_time` (`create_time`) USING BTREE
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4 COMMENT ='文章表'
  ROW_FORMAT = COMPACT;

CREATE TABLE IF NOT EXISTS `article_category`
(
  `id`              bigint(20) UNSIGNED                                           NOT NULL AUTO_INCREMENT COMMENT '分类id',
  `parent_id`       bigint(20) UNSIGNED                                           NOT NULL DEFAULT '0' COMMENT '分类父id',
  `article_count`   bigint(20) UNSIGNED                                           NOT NULL DEFAULT '0' COMMENT '分类文章数',
  `status`          tinyint(3) UNSIGNED                                           NOT NULL DEFAULT '1' COMMENT '状态,1:有效,0:无效',
  `delete_time`     DATETIME                                                      NULL COMMENT '删除时间',
  `sort`            float                                                         NOT NULL DEFAULT '10000' COMMENT '排序',
  `name`            varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '分类名称',
  `description`     varchar(255)                                                  NOT NULL DEFAULT '' COMMENT '分类描述',
  `path`            varchar(255)                                                  NOT NULL DEFAULT '' COMMENT '分类层级关系路径',
  `seo_title`       varchar(100)                                                  NOT NULL DEFAULT '',
  `seo_keywords`    varchar(255)                                                  NOT NULL DEFAULT '',
  `seo_description` varchar(255)                                                  NOT NULL DEFAULT '',
  `index_tpl`       varchar(50)                                                   NULL COMMENT '分类首页模板',
  `list_tpl`        varchar(50)                                                   NULL COMMENT '分类列表模板',
  `one_tpl`         varchar(50)                                                   NULL COMMENT '分类文章页模板',
  `more`            text COMMENT '扩展属性',
  PRIMARY KEY (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4 COMMENT ='文章分类表';


CREATE TABLE IF NOT EXISTS `slides`
(
  `id`          int(11)                         NOT NULL AUTO_INCREMENT,
  `status`      tinyint(3) UNSIGNED             NOT NULL DEFAULT '1' COMMENT '状态,1:显示,0不显示',
  `delete_time` DATETIME                        NULL COMMENT '删除时间',
  `name`        varchar(50) CHARACTER SET utf8  NOT NULL DEFAULT '' COMMENT '幻灯片分类',
  `remark`      varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '' COMMENT '分类备注',
  PRIMARY KEY (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4 COMMENT ='幻灯片表';

CREATE TABLE IF NOT EXISTS `slide_items`
(
  `id`          int(10) UNSIGNED                NOT NULL AUTO_INCREMENT,
  `slide_id`    int(11)                         NULL COMMENT '幻灯片id',
  `status`      tinyint(3) UNSIGNED             NOT NULL DEFAULT '1' COMMENT '状态,1:显示;0:隐藏',
  `sort`        float                           NOT NULL DEFAULT '10000' COMMENT '排序',
  `title`       varchar(50)                     NOT NULL DEFAULT '' COMMENT '幻灯片名称',
  `image`       varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '' COMMENT '幻灯片图片',
  `url`         varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '' COMMENT '幻灯片链接',
  `target`      varchar(10)                     NOT NULL DEFAULT '' COMMENT '链接打开方式',
  `description` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '幻灯片描述',
  `content`     text CHARACTER SET utf8 COMMENT '幻灯片内容',
  `more`        text COMMENT '扩展信息',
  PRIMARY KEY (`id`),
  KEY `slide_id` (`slide_id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4 COMMENT ='幻灯片子项表';

create table if not exists `users`
(
  `id`               INT UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '主键',
  `user_id`          VARCHAR(50)  NOT NULL COMMENT '用户id',
  `username`         VARCHAR(50)  NOT NULL COMMENT '用户名',
  `password`         VARCHAR(255) NOT NULL COMMENT '用户密码',
  `full_name`        VARCHAR(50)  NULL COMMENT '用户姓名',
  `nick_name`        VARCHAR(50)  NULL COMMENT '用户昵称',
  `avatar`           VARCHAR(255) NULL COMMENT '用户头像',
  `gender`           TINYINT      NULL COMMENT '性别(0女，1男)',
  `mobile`           varchar(50)  NULL COMMENT '手机',
  `phone`            VARCHAR(50)  NULL COMMENT '固定电话',
  `email`            VARCHAR(255) NULL COMMENT '电子邮件',
  `address`          VARCHAR(255) NULL COMMENT '用户地址',
  `qq`               VARCHAR(50)  NULL COMMENT 'qq号码',
  `status`           TINYINT      NULL DEFAULT '1' COMMENT '状态(0禁用,1正常,2待审核)',
  `login_times`      INT UNSIGNED NULL DEFAULT '0' COMMENT '登录次数',
  `login_time`       DATETIME     NULL COMMENT '登录时间',
  `last_login_time`  DATETIME     NULL COMMENT '上次登录时间',
  `ip`               VARCHAR(255) NULL COMMENT '登录ip地址',
  `secret`           VARCHAR(255) NULL COMMENT '加密密钥',
  `create_user_id`   VARCHAR(50)  NULL COMMENT '创建用户id',
  `create_user_name` VARCHAR(50)  NULL COMMENT '创建用户姓名',
  `modify_user_id`   VARCHAR(50)  NULL COMMENT '修改用户id',
  `modify_user_name` VARCHAR(50)  NULL COMMENT '修改用户姓名',
  `create_time`      DATETIME     NULL COMMENT '创建时间',
  `update_time`      DATETIME     NULL COMMENT '修改时间',
  `delete_time`      DATETIME     NULL COMMENT '删除时间',
  `more`             VARCHAR(255) NULL COMMENT '扩展备用',
    PRIMARY KEY (`id`),
  UNIQUE INDEX (`user_id`),
  UNIQUE INDEX (`username`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4 COMMENT ='用户信息表';