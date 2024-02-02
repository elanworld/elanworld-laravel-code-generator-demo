<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>

<div class="container">
    @yield('content')
</div>
<script>
    // 获取页面上所有带有title属性的元素
    var elementsWithTitles = document.querySelectorAll('[title]');
    // 遍历元素列表
    elementsWithTitles.forEach(function (element) {
        // 检查元素的文本内容是否为空
        if (element.textContent.trim() === '') {
            // 将title属性的值赋给元素的文本内容
            element.textContent = element.getAttribute('title');
        }
    });
</script>
</body>
</html>
