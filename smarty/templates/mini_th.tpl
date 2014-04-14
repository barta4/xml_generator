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
                <title><![CDATA[{%$pack['music:song_name']|regex_replace:"/\"(.*)\"@(th|en)\\./":"$1"%} - ฟังเพลง - {%$pack['music:url']|regex_replace:"/<http:\/\/[^\\.]*\\.([^\\.]*).*/":"$1"%}]]></title>
                <url><![CDATA[{%$pack['music:url']|regex_replace:"/<(.*)>\\./":"$1"%}]]></url>
                <showurl><![CDATA[{%$pack['music:url']|regex_replace:"/<http:\/\/([^\/]*).*/":"$1"%}]]></showurl>
                <song> 
                    <text><![CDATA[ชื่อเพลง]]></text>
                    <default_text><![CDATA[N/A]]></default_text>
                    <name><![CDATA[{%$pack['music:song_name']|regex_replace:"/\"(.*)\"@(th|en)\\./":"$1"%}]]></name>
                    <url><![CDATA[{%$pack['music:url']|regex_replace:"/<(.*)>\\./":"$1"%}]]></url>
                </song>
                <singer> 
                    <text><![CDATA[ศิลปิน]]></text>
                    <default_text><![CDATA[N/A]]></default_text>
                    <name><![CDATA[{%$pack['music:singer']|regex_replace:"/\"(.*)\"@(th|en)\\./":"$1"%}]]></name>
                </singer>
                <album> 
                    <text><![CDATA[อัลบั้ม]]></text>
                    <default_text><![CDATA[N/A]]></default_text>
                    <name><![CDATA[{%$pack['music:album']|regex_replace:"/\"(.*)\"@(th|en)\\./":"$1"%}]]></name>
                </album>
                <play> 
                    <text><![CDATA[play]]></text>
                    <default_text><![CDATA[N/A]]></default_text>
                    <url><![CDATA[{%$pack['music:url']|regex_replace:"/<(.*)>\\./":"$1"%}]]></url>
                </play>
                <source> 
                    <text><![CDATA[เว็บไซต์]]></text>
                    <default_text><![CDATA[N/A]]></default_text>
                    <name><![CDATA[{%$pack['music:url']|regex_replace:"/<http:\/\/[^\\.]*\\.([^\\.]*).*/":"$1"%}]]></name>
                    <url><![CDATA[{%$pack['music:url']|regex_replace:"/<(http:\/\/[^\/]*\/).*/":"$1"|regex_replace:"/(http:\/\/www\\.rsonlinemusic\\.com\/)/":"http://www.rsonlinemusic.com/home.php"%}]]></url>
                </source>
                <lyric><![CDATA[{%$pack['music:words_song']|regex_replace:"/\"(.*)\\$\\$.*/":"$1"|truncate:1024:""|regex_replace:"/\\\\n/":" "%}]]></lyric>
            </display>
        </data>
    </url>
    {%/while%}	
</urlset>
