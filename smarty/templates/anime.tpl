<?xml version="1.0"?>
<DOCUMENT>
    {%while $pack=$packer->get_one_pack()%}
    <item>
        <key><![CDATA[{%$pack.key%}]]></key>		
        <display>
            <url><![CDATA[http://www.baidu.com]]></url>
            {%if array_key_exists('Manga.title', $pack)%}
            <list>
                <title><![CDATA[{%$pack['Manga.title']%}]]></title>
                {%if $pack['properties']['Manga.text']=='PROPERPTY_TYPE_SCALAR'%}
                <item>
                   <text><![CDATA[{%$pack['Manga.text']%}]]></text> 
                   <keyword><![CDATA[{%$pack['Manga.keyword']%}]]></keyword>
                   <pic>
                       <src><![CDATA[{%$pack['Manga.pic.src']%}]]></src>
                       <keyword><![CDATA[{%$pack['Manga.pic.keyword']%}]]></keyword>
                   </pic>
                   <kvpair>
                       <key><![CDATA[{%$pack['Manga.Published']%}]]></key>
                       <value>
                           <text><![CDATA[{%$pack['Manga.Published.year']%}]]></text> 
                       </value>
                   </kvpair>
                    <kvpair>
                       <key><![CDATA[{%$pack['Manga.Origin run']%}]]></key>
                       <value>
                           <text><![CDATA[{%$pack['Manga.Origin run.year']%}]]></text> 
                       </value>
                   </kvpair>
                   <kvpair>
                       <key><![CDATA[{%$pack['Manga.update to']%}]]></key>
                       <value>
                           <text><![CDATA[{%$pack['Manga.update to.Chapter']%}]]></text> 
                           {%if (array_key_exists('Manga.update to.keyword', $pack) && !strpos($pack['Manga.update to.Chapter'], 'Completo'))%}
                           <keyword><![CDATA[{%$pack['Manga.update to.keyword']%}]]></keyword> 
                           {%/if%}
                       </value>
                   </kvpair>
                </item>
                {%else%}
                {%foreach $pack['Manga.text'] as $index=>$value%}
                <item>
                   <text><![CDATA[{%$pack['Manga.text'][$index]%}]]></text> 
                   <keyword><![CDATA[{%$pack['Manga.keyword'][$index]%}]]></keyword>
                   <pic>
                       <src><![CDATA[{%$pack['Manga.pic.src'][$index]%}]]></src>
                       <keyword><![CDATA[{%$pack['Manga.pic.keyword'][$index]%}]]></keyword>
                   </pic>
                   <kvpair>
                       <key><![CDATA[{%$pack['Manga.Published'][$index]%}]]></key>
                       <value>
                           <text><![CDATA[{%$pack['Manga.Published.year'][$index]%}]]></text> 
                       </value>
                   </kvpair>
                    <kvpair>
                       <key><![CDATA[{%$pack['Manga.Origin run'][$index]%}]]></key>
                       <value>
                           <text><![CDATA[{%$pack['Manga.Origin run.year'][$index]%}]]></text> 
                       </value>
                   </kvpair>
                   <kvpair>
                       <key><![CDATA[{%$pack['Manga.update to'][$index]%}]]></key>
                       <value>
                           <text><![CDATA[{%$pack['Manga.update to.Chapter'][$index]%}]]></text> 
                           {%if (array_key_exists('Manga.update to.keyword', $pack) && !strpos($pack['Manga.update to.Chapter'][$index], 'Completo'))%}
                           <keyword><![CDATA[{%$pack['Manga.update to.keyword'][$index]%}]]></keyword> 
                           {%/if%}
                       </value>
                   </kvpair>
                </item>
                {%/foreach%}
                {%/if%}
            </list>
            {%/if%}
            {%if array_key_exists('Anime.title', $pack)%}
            <list>
                <title><![CDATA[{%$pack['Anime.title']%}]]></title>
                {%if $pack['properties']['Anime.text']=='PROPERPTY_TYPE_SCALAR'%}
                <item>
                   <text><![CDATA[{%$pack['Anime.text']%}]]></text> 
                   <keyword><![CDATA[{%$pack['Anime.keyword']%}]]></keyword>
                   <pic>
                       <src><![CDATA[{%$pack['Anime.pic.src']%}]]></src>
                       <keyword><![CDATA[{%$pack['Anime.pic.keyword']%}]]></keyword>
                   </pic>
                   <kvpair>
                       <key><![CDATA[{%$pack['Anime.Origin run']%}]]></key>
                       <value>
                           <text><![CDATA[{%$pack['Anime.Origin run.year']%}]]></text> 
                       </value>
                   </kvpair> 
                   <kvpair>
                       <key><![CDATA[{%$pack['Anime.update to']%}]]></key>
                       <value>
                           <text><![CDATA[{%$pack['Anime.update to.Episode']%}]]></text> 
                           {%if (array_key_exists('Anime.update to.keyword', $pack) && !strpos($pack['Anime.update to.Episode'], 'Completo'))%}
                           <keyword><![CDATA[{%$pack['Anime.update to.keyword']%}]]></keyword> 
                           {%/if%}
                       </value>
                   </kvpair>
                   <kvpair>
                       <key><![CDATA[{%$pack['Anime.Directed by']%}]]></key>
                       <value>
                           <text><![CDATA[{%$pack['Anime.Directed by.people']%}]]></text> 
                           <keyword><![CDATA[{%$pack['Anime.Directed by.keyword']%}]]></keyword> 
                       </value>
                   </kvpair>
                </item>
                {%else%}
                {%foreach $pack['Anime.text'] as $index=>$value%}
                <item>
                   <text><![CDATA[{%$pack['Anime.text'][$index]%}]]></text> 
                   <keyword><![CDATA[{%$pack['Anime.keyword'][$index]%}]]></keyword>
                   <pic>
                       <src><![CDATA[{%$pack['Anime.pic.src'][$index]%}]]></src>
                       <keyword><![CDATA[{%$pack['Anime.pic.keyword'][$index]%}]]></keyword>
                   </pic>
                   <kvpair>
                       <key><![CDATA[{%$pack['Anime.Origin run'][$index]%}]]></key>
                       <value>
                           <text><![CDATA[{%$pack['Anime.Origin run.year'][$index]%}]]></text> 
                       </value>
                   </kvpair> 
                   <kvpair>
                       <key><![CDATA[{%$pack['Anime.update to'][$index]%}]]></key>
                       <value>
                           <text><![CDATA[{%$pack['Anime.update to.Episode'][$index]%}]]></text> 
                           {%if (array_key_exists('Anime.update to.keyword', $pack) && !strpos($pack['Anime.update to.Episode'][$index], 'Completo'))%}
                           <keyword><![CDATA[{%$pack['Anime.update to.keyword']%}]]></keyword> 
                           {%/if%}
                       </value>
                   </kvpair>
                   <kvpair>
                       <key><![CDATA[{%$pack['Anime.Directed by'][$index]%}]]></key>
                       <value>
                           <text><![CDATA[{%$pack['Anime.Directed by.people'][$index]%}]]></text> 
                           <keyword><![CDATA[{%$pack['Anime.Directed by.keyword'][$index]%}]]></keyword> 
                       </value>
                   </kvpair>
                </item>
                {%/foreach%}
                {%/if%}
            </list>
            {%/if%}
            {%if array_key_exists('Filmes.title', $pack)%}
            <list>
                <title><![CDATA[{%$pack['Filmes.title']%}]]></title>
                {%if $pack['properties']['Filmes.text']=='PROPERPTY_TYPE_SCALAR'%}
                <item>
                   <text><![CDATA[{%$pack['Filmes.text']%}]]></text> 
                   <keyword><![CDATA[{%$pack['Filmes.keyword']%}]]></keyword>
                </item>
                {%else%}
                {%foreach $pack['Filmes.text'] as $index=>$value%}
                <item>
                   <text><![CDATA[{%$pack['Filmes.text'][$index]%}]]></text> 
                   <keyword><![CDATA[{%$pack['Filmes.keyword'][$index]%}]]></keyword>
                </item>
                {%/foreach%}
                {%/if%}
            </list>
            {%/if%}
        </display>
    </item>
    {%/while%}	
</DOCUMENT>
