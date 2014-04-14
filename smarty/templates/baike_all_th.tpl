<DOCUMENT>
    {%while $pack=$packer->get_one_pack()%}
    <item>
        <key><![CDATA[{%$pack.key%}]]></key>
        <display>
            <title><![CDATA[{%$pack.key%} - วิกิพีเดีย]]></title>
            <url><![CDATA[{%$pack.wiki_url%}]]></url>
            <showurl><![CDATA[{%$pack.wiki_url|regex_replace:"/http:\/\/([^\/]*\/[^\/]*\/).*/":"$1"%}{%$pack.key%}]]></showurl>
            {%if array_key_exists('pic', $pack)%}
            <pic><![CDATA[{%$pack.pic%}]]></pic>
            {%/if%}
            <abstract><![CDATA[{%$pack.summary%}]]></abstract>
            <more>
                <text>Wikipedia</text>
                <text_url><![CDATA[{%$pack.wiki_url%}]]></text_url>
            </more>
        </display>
    </item>
    {%/while%}	
</DOCUMENT>
