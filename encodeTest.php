<html>
    <body>
        <?php
            $url = "http://www.baidu.com/index.html?t=33&s=ff&*@-_+./!~'();/?:&=+$,#中国你好1!2~3*4'5(6)`  ";
        ?>
        <div>
            编码的目的是值的传递,常见方式:url提交传递,cookie提交,需要前后端的配合,也就要求前后端编码,解码方式统一
        </div>
        <script>
            //js编码
            //escape 
            //该方法不会对 ASCII 字母和数字进行编码 
            //也不会对下面这些 ASCII 标点符号进行编码： * @ - _ + . / 。其他所有的字符都会被转义序列替换。
            
            var str1 = "<?php echo $url; ?>";
            
            document.write("url: "+str1+"<br/><br/>");
            document.write("js encode:<br/>");
            document.write("escape: * @ - _ + . / <br/>");
            document.write("js eacape(url):<br/>");
            document.write(escape(str1));
            document.write("<br/><br/>");
            
            
            //encodeURI
            //该方法不会对 ASCII 字母和数字进行编码，也不会对这些 ASCII 标点符号进行编码： - _ . ! ~ * ' ( )
            //该方法的目的是对 URI 进行完整的编码，因此对以下在 URI 中具有特殊含义的 ASCII 标点符号，
            //encodeURI() 函数是不会进行转义的：;/?:@&=+$,#
            document.write("encodeURI: - _ . ! ~ * ' ( ) ;/?:@&=+$,#  <br/>");
            document.write("js encodeURI(url):<br/>");
            document.write(encodeURI(str1));
            document.write("<br/><br/>");
            
            //encodeURIComponent
            //该方法不会对 ASCII 字母和数字进行编码，也不会对这些 ASCII 标点符号进行编码： - _ . ! ~ * ' ( ) 
            //其他字符（比如 ：;/?:@&=+$,# 这些用于分隔 URI 组件的标点符号），都是由一个或多个十六进制的转义序列替换的
            document.write("encodeURIComponent: - _ . ! ~ * ' ( )   <br/>");
            document.write("js encodeURIComponent(url):<br/>");
            document.write(encodeURIComponent(str1));
            document.write("<br/><br/>");
            
            function urlencodeJs(str){
                var str = encodeURIComponent(str);
                // replace ! ~ * ' ( )  
                str = str.replace(/!/g,"%21");
                str = str.replace(/~/g,"%71");
                str = str.replace(/\*/g,"%2A");
                str = str.replace(/'/g,"%27");
                str = str.replace(/\(/g,"%28");
                str = str.replace(/\)/g,"%29");
                // 解决空白历史问题
                str = str.replace(/%20/g,"+");
                return str;
            }
            
            //urlencodeJs
            document.write("urlencodeJs: - _ . <br/>");
            document.write("js urlencodeJs(url):<br/>");
            document.write(urlencodeJs(str1));
            document.write("<br/><br/>");
            
        </script>
        <?php
        
        // urlencode
        //返回字符串，此字符串中除了 -_. 之外的所有非字母数字字符都将被替换成百分号（%）
        //后跟两位十六进制数，空格则编码为加号（+）。
        //此编码与 WWW 表单 POST 数据的编码方式是一样的，
        //同时与 application/x-www-form-urlencoded 的媒体类型编码方式一样。
        //由于历史原因，此编码在将空格编码为加号（+）
        echo "<br/> php encode</br/>";
        echo "urlencode:  -_. <br/> ";
        echo "urlencode(url):<br/>";
        echo(urlencode($url));
        echo "<br/><br/>";
        
        //rawurlencode
        //返回字符串，此字符串中除了 -_. 之外的所有非字母数字字符都将被替换成百分号（%）
        //后跟两位十六进制数。这是在 » RFC 3986 中描述的编码，
        //是为了保护原义字符以免其被解释为特殊的 URL 定界符，
        //同时保护 URL 格式以免其被传输媒体（像一些邮件系统）使用字符转换时弄乱。
        //在 PHP 5.3.0 之前，rawurlencode 根据 » RFC 1738 来编码波浪线（~）。
        //在php5.3.4 后 因为 rawurlencode() 使用了 EBCDIC，所以波浪线字符不会再被编码。
        echo "rawurlencode:  -_. <br/> ";
        echo "rawurlencode(url):<br/>";
        echo(rawurlencode($url));
        echo "<br/>";
        ?>
        <div>
            从结果看,php编码与js编码没有哪一个是一致的,需要我们同步,建议同步urlencode,我们可以依赖encodeURIComponent
            写一个 js 的 urlencode
            <pre>
                function urlencodeJs(str){
                         var str = encodeURIComponent(str);
                         // replace ! ~ * ' ( )  
                         str = str.replace(/!/g,"%21");
                         str = str.replace(/~/g,"%71");
                         str = str.replace(/\*/g,"%2A");
                         str = str.replace(/'/g,"%27");
                         str = str.replace(/\(/g,"%28");
                         str = str.replace(/\)/g,"%29");
                         // 解决空白历史问题
                         str = str.replace(/%20/g,"+");
                         return str;
                 }
            </pre>
        </div>
    </body>
</html>


