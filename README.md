# 程序设计基础（2021秋冬）算法竞赛OJ
## 部署
1. 安装 docker
2. 拉取官方镜像
```
sudo docker pull universaloj/uoj-system
```
3. 工作目录切换为代码根目录（该文档所在目录）
```
cd /path/to/uoj-system
```
4. 挂载本地代码运行 docker
```
sudo docker run --name uoj -dit -p 80:80 \
    --cap-add SYS_PTRACE \
    -v "`pwd`"/web:/opt/uoj/web \
    -v "`pwd`"/install:/opt/uoj/install/bundle \
    -v "`pwd`"/testdata:/opt/uoj/testdata \
    universaloj/uoj-system
```
5. 浏览器访问测试
```
http://your-ip
```
## 用户注册
使用下面的脚本进行用户注册，包括单个用户和批量用户注册
```
scripts/addusr.py
```
\
以下为官方说明文档

----

<p align="center"><img src="https://github.com/UniversalOJ/UOJ-System/blob/master/web/images/logo.png?raw=true"></p>

# Universal Online Judge

> #### 一款通用的在线评测系统。

## 特性

- 前后端全面更新为 Bootstrap 4 + PHP 7。
- 多种部署方式，各取所需、省心省力、方便快捷。
- 各组成部分可单点部署，也可分离部署；支持添加多个评测机。
- 题目搜索，全局放置，任意页面均可快速到达。
- 所有题目从编译、运行到评分，都可以由出题人自定义。
- 引入 Extra Tests 和 Hack 机制，更加严谨、更有乐趣。
- 支持 OI/IOI/ACM 等比赛模式；比赛内设有提问区域。
- 博客功能，不仅可撰写图文内容，也可制作幻灯片。

## 文档

有关安装、管理、维护，可参阅：[https://universaloj.github.io/](https://universaloj.github.io/)

## 感谢

- [vfleaking](https://github.com/vfleaking) 将 UOJ 代码[开源](https://github.com/vfleaking/uoj)
- 向原项目或本项目贡献代码的人
- 给我们启发与灵感以及提供意见和建议的人

