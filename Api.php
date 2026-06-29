<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>外卖生活 - 企业微信群</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://unpkg.com/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        :root {
            --primary-color: #07C160;
            --secondary-color: #1AAD19;
            --bg-light: #F7F7F7;
            --text-dark: #333333;
            --text-gray: #666666;
            --border-light: #E5E5E5;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', 'PingFang SC', 'Hiragino Sans GB', 'Microsoft YaHei', sans-serif;
            background: var(--bg-light);
            color: var(--text-dark);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .container {
            max-width: 400px;
            width: 100%;
            text-align: center;
        }

        .logo {
            margin-bottom: 40px;
        }

        .logo-icon {
            width: 80px;
            height: 80px;
            margin-bottom: 16px;
            position: relative;
            display: inline-block;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(7, 193, 96, 0.15);
            transition: all 0.3s ease;
        }

        .logo-icon img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .logo-icon::before {
            content: '';
            position: absolute;
            top: -2px;
            left: -2px;
            right: -2px;
            bottom: -2px;
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            border-radius: 22px;
            z-index: -1;
            animation: logoGlow 3s ease-in-out infinite;
        }

        @keyframes logoGlow {
            0%, 100% { opacity: 0.3; transform: scale(1); }
            50% { opacity: 0.6; transform: scale(1.02); }
        }

        .logo-icon:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 30px rgba(7, 193, 96, 0.25);
        }

        .logo-icon:hover img {
            transform: scale(1.05);
        }

        .logo-text {
            font-size: 24px;
            font-weight: 600;
            color: var(--text-dark);
            margin: 0;
        }

        .subtitle {
            font-size: 16px;
            color: var(--text-gray);
            margin-bottom: 40px;
        }

        .qr-container {
            background: white;
            border-radius: 20px;
            padding: 40px 20px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            margin-bottom: 30px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .qr-container:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.12);
        }

        .qr-placeholder {
            width: 200px;
            height: 200px;
            border-radius: 12px;
            margin: 0 auto 20px;
            overflow: hidden;
            border: 1px solid var(--border-light);
            background: white;
            position: relative;
            transform-style: preserve-3d;
            perspective: 1000px;
        }

        /* 外发光边框 */
        .qr-placeholder::before {
            content: '';
            position: absolute;
            top: -3px;
            left: -3px;
            right: -3px;
            bottom: -3px;
            background: linear-gradient(45deg, 
                var(--primary-color) 0%,
                transparent 25%,
                transparent 75%,
                var(--primary-color) 100%
            );
            background-size: 200% 200%;
            border-radius: 14px;
            z-index: -2;
            opacity: 0;
            transition: opacity 0.4s ease;
            animation: glowPulse 3s ease-in-out infinite;
        }

        .qr-placeholder:hover::before {
            opacity: 0.6;
        }

        @keyframes glowPulse {
            0%, 100% { 
                background-position: 0% 50%;
                box-shadow: 0 0 20px rgba(7, 193, 96, 0.3);
            }
            50% { 
                background-position: 100% 50%;
                box-shadow: 0 0 30px rgba(7, 193, 96, 0.5);
            }
        }

        /* 多层滑动特效 */
        .qr-placeholder::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, 
                transparent 0%,
                rgba(7, 193, 96, 0.1) 20%,
                rgba(7, 193, 96, 0.4) 50%,
                rgba(7, 193, 96, 0.1) 80%,
                transparent 100%
            );
            transition: left 0.8s cubic-bezier(0.4, 0, 0.2, 1);
            z-index: 1;
        }

        .qr-placeholder:hover::before {
            left: 100%;
        }

        /* 第二层滑动效果 */
        .qr-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(45deg, 
                transparent 30%,
                rgba(255, 255, 255, 0.1) 50%,
                transparent 70%
            );
            transform: translateX(-100%);
            transition: transform 0.6s ease;
            z-index: 2;
            pointer-events: none;
        }

        .qr-placeholder:hover .qr-overlay {
            transform: translateX(100%);
        }

        .qr-image-wrapper {
            width: 100%;
            height: 100%;
            position: relative;
            border-radius: 10px;
            background: white;
            padding: 4px;
            box-shadow: 0 3px 15px rgba(0, 0, 0, 0.1);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .qr-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 6px;
            transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1), 
                        filter 0.4s ease;
            border: 2px solid #f0f0f0;
            position: relative;
            z-index: 1;
        }

        .qr-placeholder:hover .qr-image-wrapper {
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.15);
            transform: scale(1.02);
            border: 1px solid rgba(7, 193, 96, 0.3);
        }

        .qr-placeholder:hover .qr-image {
            border-color: rgba(7, 193, 96, 0.2);
            filter: brightness(1.05);
        }

        /* 图片装饰内边框 */
        .qr-image-wrapper::before {
            content: '';
            position: absolute;
            top: -1px;
            left: -1px;
            right: -1px;
            bottom: -1px;
            border: 1px solid transparent;
            border-radius: 11px;
            background: linear-gradient(45deg, 
                rgba(7, 193, 96, 0.3) 0%, 
                transparent 30%, 
                transparent 70%, 
                rgba(7, 193, 96, 0.3) 100%
            );
            opacity: 0;
            transition: opacity 0.4s ease;
            z-index: 2;
        }

        .qr-placeholder:hover .qr-image-wrapper::before {
            opacity: 1;
            animation: borderShimmer 2s ease-in-out infinite;
        }

        @keyframes borderShimmer {
            0%, 100% { 
                background-position: 0% 50%;
                transform: rotate(0deg);
            }
            50% { 
                background-position: 100% 50%;
                transform: rotate(1deg);
            }
        }

        .qr-placeholder:hover .qr-image {
            transform: scale(1.08) rotateY(5deg);
            filter: brightness(1.15) contrast(1.05);
            box-shadow: 0 10px 40px rgba(7, 193, 96, 0.2);
        }

        /* 多条扫描线动画 */
        .qr-placeholder::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 2px;
            background: linear-gradient(90deg, 
                transparent, 
                var(--primary-color) 50%, 
                transparent
            );
            animation: scanLine 2s ease-in-out infinite;
            z-index: 3;
        }

        @keyframes scanLine {
            0% { top: 0; opacity: 0; transform: scaleX(0.5); }
            20% { opacity: 1; transform: scaleX(1); }
            80% { opacity: 1; transform: scaleX(1); }
            100% { top: calc(100% - 2px); opacity: 0; transform: scaleX(0.5); }
        }

        /* 垂直扫描线 */
        .scan-vertical {
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            width: 2px;
            background: linear-gradient(180deg, 
                transparent, 
                rgba(7, 193, 96, 0.3) 50%, 
                transparent
            );
            animation: scanVertical 3s ease-in-out infinite;
            z-index: 3;
        }

        @keyframes scanVertical {
            0% { left: 0; opacity: 0; }
            20% { opacity: 1; }
            80% { opacity: 1; }
            100% { left: calc(100% - 2px); opacity: 0; }
        }

        /* 多层旋转边框 */
        .rotating-border {
            position: absolute;
            top: -2px;
            left: -2px;
            right: -2px;
            bottom: -2px;
            border: 2px solid transparent;
            border-radius: 14px;
            background: linear-gradient(45deg, 
                transparent, 
                var(--primary-color), 
                transparent, 
                var(--secondary-color), 
                transparent
            );
            background-size: 300% 300%;
            opacity: 0;
            transition: opacity 0.4s ease;
            z-index: 0;
            animation: borderRotate 3s linear infinite;
        }

        .qr-placeholder:hover .rotating-border {
            opacity: 1;
        }

        @keyframes borderRotate {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        /* 虚线动画边框 */
        .dashed-border {
            position: absolute;
            top: -5px;
            left: -5px;
            right: -5px;
            bottom: -5px;
            border: 2px dashed var(--primary-color);
            border-radius: 16px;
            opacity: 0;
            transition: opacity 0.4s ease;
            z-index: -1;
            animation: dashMove 20s linear infinite;
        }

        .qr-placeholder:hover .dashed-border {
            opacity: 0.3;
        }

        @keyframes dashMove {
            0% { border-offset: 0px; }
            100% { border-offset: 20px; }
        }

        /* 内发光边框 */
        .inner-glow {
            position: absolute;
            top: 1px;
            left: 1px;
            right: 1px;
            bottom: 1px;
            border: 1px solid rgba(7, 193, 96, 0);
            border-radius: 11px;
            transition: all 0.4s ease;
            z-index: 6;
            pointer-events: none;
        }

        .qr-placeholder:hover .inner-glow {
            border-color: rgba(7, 193, 96, 0.5);
            box-shadow: inset 0 0 10px rgba(7, 193, 96, 0.2);
        }

        /* 角落装饰边框 */
        .corner-frame {
            position: absolute;
            top: 8px;
            left: 8px;
            right: 8px;
            bottom: 8px;
            border: 1px solid rgba(7, 193, 96, 0);
            border-radius: 8px;
            transition: all 0.4s ease;
            z-index: 7;
            pointer-events: none;
        }

        .qr-placeholder:hover .corner-frame {
            border-color: rgba(7, 193, 96, 0.3);
            transform: scale(1.02);
        }

        /* 图片装饰边框 */
        .qr-image-frame {
            position: absolute;
            top: 2px;
            left: 2px;
            right: 2px;
            bottom: 2px;
            border: 2px solid transparent;
            border-radius: 10px;
            background: linear-gradient(45deg, 
                rgba(255, 255, 255, 0.8) 0%, 
                rgba(255, 255, 255, 0.3) 50%, 
                rgba(255, 255, 255, 0.8) 100%
            );
            z-index: 0;
            transition: all 0.3s ease;
        }

        .qr-placeholder:hover .qr-image-frame {
            opacity: 0.8;
            transform: scale(1.01);
        }

        /* 图片内阴影边框 */
        .qr-image::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            border-radius: 8px;
            box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.1);
            pointer-events: none;
            z-index: 2;
        }

        /* 图片高光边框 */
        .qr-image::before {
            content: '';
            position: absolute;
            top: -1px;
            left: -1px;
            right: -1px;
            bottom: -1px;
            border-radius: 9px;
            background: linear-gradient(135deg, 
                rgba(255, 255, 255, 0.4) 0%, 
                transparent 30%, 
                transparent 70%, 
                rgba(255, 255, 255, 0.4) 100%
            );
            z-index: 3;
            opacity: 0;
            transition: opacity 0.4s ease;
        }

        .qr-placeholder:hover .qr-image::before {
            opacity: 1;
        }

        /* 外层光晕 */
        .outer-halo {
            position: absolute;
            top: -8px;
            left: -8px;
            right: -8px;
            bottom: -8px;
            background: radial-gradient(circle at center, 
                rgba(7, 193, 96, 0.1) 0%,
                transparent 70%
            );
            border-radius: 18px;
            opacity: 0;
            transition: opacity 0.4s ease;
            z-index: -3;
        }

        .qr-placeholder:hover .outer-halo {
            opacity: 1;
            animation: haloPulse 2s ease-in-out infinite;
        }

        @keyframes haloPulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }

        /* 四角角标 */
        .qr-corners {
            position: absolute;
            top: 8px;
            left: 8px;
            right: 8px;
            bottom: 8px;
            pointer-events: none;
            z-index: 4;
        }

        .qr-corners::before,
        .qr-corners::after,
        .corner-tl,
        .corner-br {
            position: absolute;
            width: 16px;
            height: 16px;
            border: 2px solid var(--primary-color);
            opacity: 0;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .qr-corners::before {
            content: '';
            top: 0;
            left: 0;
            border-right: none;
            border-bottom: none;
            border-top-left-radius: 4px;
        }

        .qr-corners::after {
            content: '';
            bottom: 0;
            right: 0;
            border-left: none;
            border-top: none;
            border-bottom-right-radius: 4px;
        }

        .corner-tl {
            top: 0;
            left: 0;
            border-right: none;
            border-bottom: none;
            border-top-left-radius: 4px;
            transform: scale(0) rotate(-90deg);
        }

        .corner-br {
            bottom: 0;
            right: 0;
            border-left: none;
            border-top: none;
            border-bottom-right-radius: 4px;
            transform: scale(0) rotate(90deg);
        }

        .qr-placeholder:hover .qr-corners::before,
        .qr-placeholder:hover .qr-corners::after,
        .qr-placeholder:hover .corner-tl,
        .qr-placeholder:hover .corner-br {
            opacity: 1;
            transform: scale(1) rotate(0deg);
        }

        .qr-placeholder:hover .corner-tl,
        .qr-placeholder:hover .corner-br {
            animation: cornerPulse 1s ease-in-out infinite alternate;
        }

        @keyframes cornerPulse {
            0% { transform: scale(1) rotate(0deg); }
            100% { transform: scale(1.1) rotate(5deg); }
        }

        /* 微光粒子效果 */
        .particles {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 5;
        }

        .particle {
            position: absolute;
            width: 4px;
            height: 4px;
            background: var(--primary-color);
            border-radius: 50%;
            opacity: 0;
        }

        @keyframes particleFloat {
            0% { 
                transform: translateY(0) translateX(0) scale(0);
                opacity: 0;
            }
            20% {
                opacity: 1;
                transform: scale(1);
            }
            100% { 
                transform: translateY(-100px) translateX(calc(100px - 100%)) scale(0.5);
                opacity: 0;
            }
        }

        .qr-title {
            font-size: 18px;
            font-weight: 600;
            color: var(--text-dark);
            margin-bottom: 8px;
        }

        .qr-description {
            font-size: 14px;
            color: var(--text-gray);
            margin-bottom: 20px;
            line-height: 1.5;
        }

        .steps {
            text-align: left;
            background: rgba(7, 193, 96, 0.05);
            border-radius: 12px;
            padding: 20px;
            margin-top: 20px;
        }

        .step {
            display: flex;
            align-items: flex-start;
            margin-bottom: 12px;
            font-size: 14px;
            color: var(--text-dark);
        }

        .step:last-child {
            margin-bottom: 0;
        }

        .step-number {
            width: 20px;
            height: 20px;
            background: var(--primary-color);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            font-weight: 600;
            margin-right: 12px;
            flex-shrink: 0;
        }

        .step-text {
            flex: 1;
            line-height: 1.5;
        }

        .footer {
            margin-top: 40px;
            text-align: center;
        }

        .footer-text {
            font-size: 12px;
            color: var(--text-gray);
        }

        .wechat-brand {
            color: var(--primary-color);
            font-weight: 600;
        }

        .contact-hint {
            margin-top: 20px;
            padding: 12px 16px;
            background: linear-gradient(135deg, rgba(7, 193, 96, 0.08) 0%, rgba(26, 188, 99, 0.08) 100%);
            border-radius: 12px;
            border: 2px solid rgba(7, 193, 96, 0.2);
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .contact-hint::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, 
                transparent, 
                rgba(7, 193, 96, 0.1), 
                transparent
            );
            transition: left 0.6s ease;
        }

        .contact-hint:hover::before {
            left: 100%;
        }

        .contact-hint:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(7, 193, 96, 0.15);
            border-color: var(--primary-color);
        }

        .contact-hint-text {
            font-size: 14px;
            color: var(--text-dark);
            margin: 0;
            font-weight: 500;
            text-align: center;
            position: relative;
            z-index: 2;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            line-height: 1.3;
        }

        .contact-hint-text i {
            font-size: 16px;
            color: var(--primary-color);
            animation: iconPulse 2s ease-in-out infinite;
        }

        @keyframes iconPulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.1); }
        }

        .contact-phone {
            color: var(--primary-color);
            font-weight: 600;
            font-size: 15px;
            text-decoration: none;
            transition: all 0.3s ease;
            padding: 2px 6px;
            border-radius: 4px;
            background: rgba(7, 193, 96, 0.05);
        }

        .contact-phone:hover {
            background: rgba(7, 193, 96, 0.1);
            transform: scale(1.05);
        }

        @media (max-width: 480px) {
            .container {
                padding: 0 15px;
            }
            
            .qr-container {
                padding: 30px 15px;
            }
            
            .qr-placeholder {
                width: 180px;
                height: 180px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Logo区域 -->
        <div class="logo">
            <h1 class="logo-text">外卖生活</h1>
        </div>

        <!-- 副标题 -->
        <p class="subtitle">扫码加入企业微信群，获取专属服务</p>

        <!-- 二维码区域 -->
        <div class="qr-container">
            <div class="qr-placeholder">
                <div class="qr-image-wrapper">
                    <img src="https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=https://work.weixin.qq.com/" 
                         alt="企业微信群二维码" 
                         class="qr-image">
                </div>
            </div>
            <h2 class="qr-title">使用微信扫描二维码</h2>
            <p class="qr-description">
                加入外卖生活企业微信群，享受专属优惠和服务
            </p>

            <!-- 操作步骤 -->
            <div class="steps">
                <div class="step">
                    <div class="step-number">1</div>
                    <div class="step-text">打开微信，点击右上角"+"号</div>
                </div>
                <div class="step">
                    <div class="step-number">2</div>
                    <div class="step-text">选择"扫一扫"功能</div>
                </div>
                <div class="step">
                    <div class="step-number">3</div>
                    <div class="step-text">扫描上方二维码加入群聊</div>
                </div>
            </div>
        </div>

        <!-- 联系提示 -->
        <div class="contact-hint">
            <p class="contact-hint-text">
                <i class="bi bi-info-circle"></i>
                <span>如遇问题，请联系客服：</span>
                <a href="tel:400-123-4567" class="contact-phone">400-123-4567</a>
            </p>
        </div>

        <!-- 页脚 -->
        <div class="footer">
            <p class="footer-text">
                <span class="wechat-brand">
                京ICP证070791号 · 
                京公网安备 11000002002052号</span>
            </p>
        </div>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://unpkg.com/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // 页面加载动画
        document.addEventListener('DOMContentLoaded', function() {
            const elements = document.querySelectorAll('.logo, .subtitle, .qr-container, .contact-hint, .footer');
            elements.forEach((element, index) => {
                element.style.opacity = '0';
                element.style.transform = 'translateY(20px)';
                element.style.transition = 'all 0.6s ease-out';
                
                setTimeout(() => {
                    element.style.opacity = '1';
                    element.style.transform = 'translateY(0)';
                }, index * 200);
            });
        });

        // 二维码交互效果
        const qrPlaceholder = document.querySelector('.qr-placeholder');
        const particlesContainer = document.getElementById('qrParticles');
        
        // 创建粒子效果
        function createParticle() {
            const particle = document.createElement('div');
            particle.className = 'particle';
            
            // 随机起始位置
            const startX = Math.random() * 100;
            const startY = 100;
            
            particle.style.cssText = `
                left: ${startX}%;
                top: ${startY}%;
                animation: particleFloat ${2 + Math.random() * 2}s ease-out;
                animation-delay: ${Math.random() * 2}s;
            `;
            
            particlesContainer.appendChild(particle);
            
            // 动画结束后移除粒子
            setTimeout(() => {
                particle.remove();
            }, 4000);
        }

        // 定期创建粒子
        function startParticles() {
            createParticle();
            setTimeout(startParticles, 800 + Math.random() * 1200);
        }

        // 鼠标悬停时启动粒子效果
        qrPlaceholder.addEventListener('mouseenter', function() {
            startParticles();
            this.style.transform = 'translateY(-4px)';
            this.style.boxShadow = '0 12px 40px rgba(7, 193, 96, 0.2)';
        });

        qrPlaceholder.addEventListener('mouseleave', function() {
            // 停止创建新粒子，但现有粒子会继续动画
            this.style.transform = 'translateY(0)';
            this.style.boxShadow = '0 4px 20px rgba(0, 0, 0, 0.08)';
        });
    </script>
</body>
</html>