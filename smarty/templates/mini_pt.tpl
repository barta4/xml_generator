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
                <title><![CDATA[{%$pack['music:song_name']|regex_replace:"/\"(.*)\"@(pt|en)\\./":"$1"%} - {%$pack['music:singer']|regex_replace:"/\"(.*)\"@(pt|en)\\./":"$1"%} - Ouvir Online {%$pack['music:url']|regex_replace:"/<http:\/\/([^\\.]*)\\.([^\\.]*).*/":"$1"%}]]></title>
                <url><![CDATA[{%$pack['music:url']|regex_replace:"/<(.*)>\\./":"$1"%}]]></url>
                <showurl><![CDATA[{%$pack['music:url']|regex_replace:"/<http:\/\/([^\/]*).*/":"$1"%}]]></showurl>
                <song> 
                    <text><![CDATA[nome da música]]></text>
                    <default_text><![CDATA[desconhecido]]></default_text>
                    <name><![CDATA[{%$pack['music:song_name']|regex_replace:"/\"(.*)\"@(pt|en)\\./":"$1"%}]]></name>
                    <url><![CDATA[{%$pack['music:url']|regex_replace:"/<(.*)>\\./":"$1"%}]]></url>
                </song>
                <singer> 
                    <text><![CDATA[Artista]]></text>
                    <default_text><![CDATA[desconhecido]]></default_text>
                    <name><![CDATA[{%$pack['music:singer']|regex_replace:"/\"(.*)\"@(pt|en)\\./":"$1"%}]]></name>
                </singer>
                <album> 
                    <text><![CDATA[Álbum]]></text>
                    <default_text><![CDATA[desconhecido]]></default_text>
                    <name><![CDATA[{%$pack['music:album']|regex_replace:"/\"(.*)\"@(pt|en)\\./":"$1"%}]]></name>
                </album>
                <mv> 
                    <text><![CDATA[vídeo]]></text>
                    <default_text><![CDATA[desconhecido]]></default_text>
                    <name><![CDATA[ouvir]]></name>
                    <url><![CDATA[{%$pack['music:url']|regex_replace:"/<(.*)>\\./":"$1"%}]]></url>
                </mv>
                <source> 
                    <text><![CDATA[site]]></text>
                    <default_text><![CDATA[desconhecido]]></default_text>
                    <name><![CDATA[{%$pack['music:url']|regex_replace:"/<http:\/\/([^\\.]*)\\.([^\\.]*).*/":"$1"%}]]></name>
                    <url><![CDATA[{%$pack['music:url']|regex_replace:"/<(http:\/\/[^\/]*\/).*/":"$1"%}]]></url>
                </source>
                <lyric><![CDATA[{%$pack['music:words_song']|regex_replace:"/\"(.*)\\$\\$.*/":"$1"|truncate:1024:""|regex_replace:"/\\\\n/":". "%}]]></lyric>
            </display>
        </data>
    </url>
    {%/while%}	
</urlset>
