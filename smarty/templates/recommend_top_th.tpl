<?xml version="1.0"?>
<DOCUMENT>
    {%while $pack=$packer->get_one_pack()%}
    <item>
        <key><![CDATA[{%$pack.key%}]]></key>
        <display>
            <title><text><![CDATA[{%$pack.recommend_title%}]]></text></title>
            {%foreach $pack.recommend_song as $song_index=>$song_id%}
            <item>
                <keyword><![CDATA[เพลง{%$pack['song_name'][$song_index]%} {%$pack['singer'][$song_index]%}]]></keyword>
                <title><![CDATA[{%$pack['song_name'][$song_index]%}]]></title>
                <summary><![CDATA[{%$pack['singer'][$song_index]%}]]></summary>
                <size><![CDATA[1]]></size>
            </item>
            {%/foreach%}			
        </display>
    </item>
    {%/while%}	
</DOCUMENT>
