<?xml version="1.0"?>
<DOCUMENT>
    {%while $pack=$packer->get_one_pack()%}
    <item>
        <key>{%$pack.key%}</key>		
        <display>
            <url>http://www.baidu.com</url>
            <freebase-basic>
                <title><![CDATA[{%$pack['music:song_name']|regex_replace:"/\"([^\"]*)\"@(th|en)\\./":"$1"%}]]></title>
                <url>http://www.baidu.com</url>
                <attr>
                    <name>ศิลปิน</name>
                    <value><![CDATA[[a keyword="{%$pack['music:singer']|regex_replace:"/\"([^\"]*)\"@(th|en)\\./":"$1"%}"] {%$pack['music:singer']|regex_replace:"/\"([^\"]*)\"@(th|en)\\./":"$1"%}[/a]]]></value>
                </attr>{%if array_key_exists('music:album', $pack)%}
                <attr>
                    <name>อัลบั้ม</name>
                    <value><![CDATA[[a keyword="อัลบั้ม {%$pack['music:album']|regex_replace:"/\"([^\"]*)\"@(th|en)\\./":"$1"%}"] {%$pack['music:album']|regex_replace:"/\"([^\"]*)\"@(th|en)\\./":"$1"%}[/a]]]></value>
                </attr>
                {%/if%}				
                <attr>
                    <name>เนื้อเพลง</name>
                    <value><![CDATA[{%$pack|regex_replace_lrc_words_song:"th"%}]]></value>
                </attr>
            </freebase-basic>  
        </display>
    </item>
    {%/while%}	
</DOCUMENT>
