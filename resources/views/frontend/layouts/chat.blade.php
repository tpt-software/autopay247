<div class="telegram-icon">
	<a href="#" class="telegram-link">
		<img src="https://autopaypm.com/static/home/img/chat/telegram_icon.png" alt="Telegram">
	</a>
</div>
<script type="text/javascript">
      document.addEventListener("DOMContentLoaded", function() {
    var telegramIcon = document.querySelector('.telegram-icon');
    var chatBox = document.createElement('div');
    chatBox.classList.add('chat-box');
    chatBox.innerHTML = `
    
        <div class="chat-header">
            <img src="https://autopaypm.com/static/home/img/chat/supporter.png" alt="Logo">
            <div class="support-info">
                <h3 style="font-size:16px;font-weight:bold;">ATPM</h3>
                <p>Bộ phận hỗ trợ 247!</p>
            </div>
            <a href="#" class="close-btn">×</a>
        </div>
        <div class="chat-content">
            <p>Xin chào! Bạn cần hỗ trợ vấn đề gì ạ?</p>
            <a href="#" class="telegram-chat-link" onclick="openTelegramChat(); return false;">
                <img src="https://image.similarpng.com/very-thumbnail/2021/10/Telegram-icon-on-transparent-background-PNG.png" alt="Telegram">
                Chat qua Telegram (24/24)
            </a>
            <a href="#" class="telegram-chat-link">
                Hotline (Từ 8h đến 22h): 0523.280.888
            </a>
            <a target="_blank" href="https://www.facebook.com/autopay247com" class="telegram-chat-link">
                Fanpage: autopay247com
            </a>
			<a target="_blank" href="https://www.facebook.com/groups/861427865809354" class="telegram-chat-link">
                Group: Mua Bán USDT Toàn Quốc
            </a>
        </div>
    `;

    telegramIcon.addEventListener('click', function(e) {
        e.preventDefault();
        document.body.appendChild(chatBox);
    });

    chatBox.querySelector('.close-btn').addEventListener('click', function() {
        var chatContent = chatBox.querySelector('.chat-content');
        chatContent.innerHTML = `
            <p>Xin chào! Bạn cần hỗ trợ vấn đề gì ạ?</p>
            <a href="#" class="telegram-chat-link" onclick="openTelegramChat(); return false;">
                <img src="https://image.similarpng.com/very-thumbnail/2021/10/Telegram-icon-on-transparent-background-PNG.png" alt="Telegram">
                Chat qua Telegram (24/24)
            </a>
            <a href="#" class="telegram-chat-link">
                Hotline (Từ 8h đến 22h): 0523.280.888
            </a>
            <a target="_blank" href="https://www.facebook.com/autopay247com" class="telegram-chat-link">
                Fanpage: autopay247com
            </a>
			<a target="_blank" href="https://www.facebook.com/groups/861427865809354" class="telegram-chat-link">
                Group: Mua Bán USDT Toàn Quốc
            </a>
        `;
        chatBox.remove();
    });
});

function openTelegramChat() {
    var url = "https://t.me/autopay247";
    var width = 500;
    var height = 800;
    var leftPosition = (window.innerWidth - width) / 2;
    var topPosition = (window.innerHeight - height) / 2;
    var options = "width=" + width + ",height=" + height + ",top=" + topPosition + ",left=" + leftPosition;
    window.open(url, "_blank", options);
}


    </script>