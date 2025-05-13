const textElement = document.querySelector('.expand-text');

// マウスオーバー時
textElement.addEventListener('mouseenter', function() {
    textElement.style.transform = 'scale(1.25)'; // 拡大
});

// マウスアウト時
textElement.addEventListener('mouseleave', function() {
    textElement.style.transform = 'scale(1)'; // 元に戻す
});