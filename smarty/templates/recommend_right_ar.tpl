<?xml version="1.0"?>
<DOCUMENT>
    {%while $pack=$packer->get_one_pack()%}
    <item>
        <key>{%$pack.key%}</key>
        <display>
            <url>http://www.baidu.com</url>
            <title>أغاني ذات الصلة</title>
            {%foreach $pack.recommend_song as $song_index=>$song_id%}
            <item>
                <text><![CDATA[{%$pack['song_name'][$song_index]%}]]></text>
                <keyword><![CDATA[{%$pack['song_name'][$song_index]%} {%$pack['singer'][$song_index]%}]]></keyword>
                <meta><![CDATA[{%$pack['singer'][$song_index]%}]]></meta>
            </item>
            {%/foreach%}			
        </display>
    </item>
    {%/while%}	
</DOCUMENT>
