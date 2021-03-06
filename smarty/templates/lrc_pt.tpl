<?xml version="1.0"?>
<DOCUMENT>
    {%while $pack=$packer->get_one_pack()%}
    <item>
        <key>{%$pack.key%}</key>		
        <display>
            <url>http://www.baidu.com</url>
            <freebase-basic>
                <title><![CDATA[{%$pack['music:song_name']|regex_replace:"/\"([^\"]*)\"@(pt|en)\\./":"$1"%}]]></title>
                <url>http://www.baidu.com</url>
                <attr>
                    <name>Artista</name>
                    <value><![CDATA[[a keyword="{%$pack['music:singer']|regex_replace:"/\"([^\"]*)\"@(pt|en)\\./":"$1"%}"] {%$pack['music:singer']|regex_replace:"/\"([^\"]*)\"@(pt|en)\\./":"$1"%}[/a]]]></value>
                </attr>{%if array_key_exists('music:album', $pack)%}
                <attr>
                    <name>Álbum</name>
                    <value><![CDATA[[a keyword="Álbum {%$pack['music:album']|regex_replace:"/\"([^\"]*)\"@(pt|en)\\./":"$1"%}"] {%$pack['music:album']|regex_replace:"/\"([^\"]*)\"@(pt|en)\\./":"$1"%}[/a]]]></value>
                </attr>
                {%/if%}	
                <attr>
                    <name>Letra</name>
                    <value><![CDATA[{%$pack|regex_replace_lrc_words_song:"pt"%}]]></value>
                </attr>
            </freebase-basic>  
        </display>
    </item>
    {%/while%}	
</DOCUMENT>
