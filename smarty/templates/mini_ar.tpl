<?xml version="1.0"?>
<urlset>
    {%while $pack=$packer->get_one_pack()%}
    <url>
        <loc><![CDATA[{%$pack['music:url']|regex_replace:"/<(.*)>\\./":"$1"%}]]></loc>
        <lastmod><![CDATA[2014-03-14]]></lastmod>
        <changefreq><![CDATA[always]]></changefreq>
        <priority><![CDATA[1.0]]></priority>
        <data>
            <display>
                <title><![CDATA[{%$pack['music:song_name']|regex_replace:"/\"(.*)\"@(ar|en)\\./":"$1"%} - {%$pack['music:singer']|regex_replace:"/\"(.*)\"@(ar|en)\\./":"$1"%} | استماع وتحميل أون لاين  على {%$pack['music:url']|regex_replace:"/<http:\/\/([^\/]*).*/":"$1"|regex_replace:"/www\\.mawaly\\.com/":"موالي"|regex_replace:"/www\\.sm3na\\.com/":"سمعنا"|regex_replace:"/www\\.6rb\\.com/":"طرب"|regex_replace:"/www\\.6rp\\.com/":"طرب توب"%}]]></title>
                <url><![CDATA[{%$pack['music:url']|regex_replace:"/<(.*)>\\./":"$1"%}]]></url>
                <showurl><![CDATA[{%$pack['music:url']|regex_replace:"/<http:\/\/([^\/]*).*/":"$1"%}]]></showurl>
                <song> 
                    <text><![CDATA[اسم الأغنية]]></text>
                    <default_text><![CDATA[مجهول]]></default_text>
                    <name><![CDATA[{%$pack['music:song_name']|regex_replace:"/\"(.*)\"@(ar|en)\\./":"$1"%}]]></name>
                    <url><![CDATA[{%$pack['music:url']|regex_replace:"/<(.*)>\\./":"$1"%}]]></url>
                </song>
                <singer> 
                    <text><![CDATA[المطرب]]></text>
                    <default_text><![CDATA[مجهول]]></default_text>
                    <name><![CDATA[{%$pack['music:singer']|regex_replace:"/\"(.*)\"@(ar|en)\\./":"$1"%}]]></name>
                </singer>
                <album> 
                    <text><![CDATA[الألبوم]]></text>
                    <default_text><![CDATA[مجهول]]></default_text>
                    <name><![CDATA[{%$pack['music:album']|regex_replace:"/\"(.*)\"@(ar|en)\\./":"$1"%}]]></name>
                </album>
                <play> 
                    <text><![CDATA[الاستماع]]></text>
                    <default_text><![CDATA[مجهول]]></default_text>
                    <name><![CDATA[الاستماع]]></name>
                    <url><![CDATA[{%$pack['music:url']|regex_replace:"/<(.*)>\\./":"$1"%}]]></url>
                </play>
                <source> 
                    <text><![CDATA[الموقع]]></text>
                    <default_text><![CDATA[مجهول]]></default_text>
                    <name><![CDATA[{%$pack['music:url']|regex_replace:"/<http:\/\/[^\\.]*\\.([^\\.]*).*/":"$1"%}]]></name>
                    <url><![CDATA[{%$pack['music:url']|regex_replace:"/<(http:\/\/[^\/]*\/).*/":"$1"%}]]></url>
                </source>
                <lyric><![CDATA[{%$pack['music:words_song']|regex_replace:"/\"(.*)\\$\\$.*/":"$1"|truncate:1024:""|regex_replace:"/\\\\n/":". "%}]]></lyric>
            </display>
        </data>
    </url>
    {%/while%}	
</urlset>
