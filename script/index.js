// script.js
document.addEventListener('DOMContentLoaded', () => {
    const buttons = document.querySelectorAll('button');
    
    // ボタンクリック時のアニメーション効果
    buttons.forEach(button => {
        button.addEventListener('click', () => {
            button.style.transform = 'scale(0.95)';
            setTimeout(() => button.style.transform = 'scale(1)', 150);
        });
    });

    // 背景色のテーマ変更（ダークモード切替など）
    const toggleTheme = document.createElement('button');
    toggleTheme.textContent = 'テーマ切替';
    toggleTheme.style.marginTop = '20px';
    document.body.appendChild(toggleTheme);

    toggleTheme.addEventListener('click', () => {
        document.body.classList.toggle('dark-theme');
    });
});


