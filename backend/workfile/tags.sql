--
-- PostgreSQL database dump
--

-- Dumped from database version 13.4 (Debian 13.4-4.pgdg110+1)
-- Dumped by pg_dump version 14.0 (Debian 14.0-1.pgdg110+1)

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- Name: tags; Type: TABLE; Schema: public; Owner: andalo
--

CREATE TABLE public.tags (
    scheda integer NOT NULL,
    tags character varying[] NOT NULL
);


ALTER TABLE public.tags OWNER TO andalo;

--
-- Data for Name: tags; Type: TABLE DATA; Schema: public; Owner: andalo
--

COPY public.tags (scheda, tags) FROM stdin;
2645	{persone}
2906	{feste}
1169	{turismo}
3877	{bambini}
2435	{adige}
4010	{"servizi pubblici"}
4505	{persone}
1764	{persone}
3140	{persone}
2618	{molveno}
4408	{persone}
3876	{bambini}
2466	{persone,emigrazione}
1066	{boschi}
937	{persone}
4252	{donne}
4295	{persone}
4297	{persone,montagne}
2111	{montagne}
430	{boschi,persone}
3035	{persone,spormaggiore}
3421	{persone}
3041	{turismo}
3331	{rifugi,edifici}
2951	{emigrazione}
2555	{edifici,molveno}
2964	{persone}
2857	{persone,cavedago}
1287	{montagne}
2601	{persone}
2506	{persone}
4162	{persone}
4476	{persone}
3440	{persone}
3276	{bambini}
161	{edifici}
4329	{bambini}
2191	{bambini}
1161	{viabilità,molveno,montagne}
922	{persone}
4074	{persone}
2503	{edifici,"servizi pubblici"}
3084	{feste}
251	{persone}
2422	{persone}
3665	{persone}
3801	{persone,montagne}
1902	{bambini}
936	{persone}
2665	{persone}
1790	{persone}
3878	{persone,bambini}
4274	{persone}
2305	{cavedago}
3514	{turismo,paganella}
2560	{molveno}
4212	{persone}
3867	{bambini}
3667	{feste}
4580	{persone}
3749	{persone}
3351	{turismo}
4485	{persone}
1327	{edifici}
4516	{persone}
893	{"caccia e pesca",montagne}
3129	{fai}
3632	{edifici,persone}
1726	{persone}
4410	{persone}
2181	{spormaggiore}
4450	{persone}
3449	{persone}
2571	{edifici}
1901	{bambini}
980	{montagne}
283	{edifici,montagne}
2311	{istruzione}
4202	{persone}
1692	{persone}
1056	{montagne}
1588	{persone}
2965	{donne}
3293	{feste}
4557	{persone}
260	{"servizi pubblici"}
1380	{persone}
4186	{persone}
1246	{montagne}
4194	{persone}
4060	{persone}
2502	{edifici,"servizi pubblici"}
2738	{persone}
2115	{persone,montagne}
2359	{persone,cavedago}
2871	{istruzione}
3089	{feste}
2188	{edifici,spormaggiore}
1157	{viabilità,molveno,montagne}
1409	{persone}
1618	{persone}
4502	{persone}
3809	{cavedago}
3069	{edifici}
4009	{"servizi pubblici"}
4221	{istruzione}
1734	{"giochi e sport"}
4581	{persone}
4296	{persone}
4270	{nisclaia}
3626	{turismo}
3314	{persone}
724	{feste}
1701	{persone}
364	{"lavori maschili"}
1399	{molveno}
2649	{molveno}
1379	{persone}
1387	{molveno}
2162	{edifici}
1810	{feste}
2557	{montagne}
665	{turismo}
1620	{persone}
3009	{"funzioni religiose"}
673	{andalo,montagne}
1415	{persone}
3447	{persone}
3518	{turismo,paganella}
643	{"funzioni religiose"}
4267	{persone,feste}
4543	{donne}
1244	{molveno,montagne}
2817	{cavedago}
1038	{montagne}
3012	{"funzioni religiose",persone}
1496	{persone}
2200	{istruzione}
3141	{persone}
4338	{persone}
1412	{spormaggiore,persone}
3565	{cavedago,"servizi pubblici"}
3018	{"funzioni religiose"}
4210	{alimentazione}
939	{persone}
2106	{persone}
2363	{feste,cavedago}
3000	{"funzioni religiose"}
3020	{"funzioni religiose"}
4634	{persone}
4260	{alimentazione}
2931	{"servizi pubblici"}
2158	{edifici,spormaggiore}
1506	{persone}
1420	{meano}
1377	{edifici}
2907	{"funzioni religiose"}
3766	{persone}
946	{edifici}
1937	{persone}
3277	{persone}
2262	{persone,cavedago}
496	{"servizi pubblici"}
3984	{cavedago,bambini}
3147	{edifici,persone}
4292	{persone}
1371	{persone}
1360	{molveno}
503	{bambini}
484	{persone}
698	{edifici,andalo}
639	{feste}
2815	{cavedago}
436	{persone}
360	{spormaggiore}
524	{"servizi pubblici",montagne}
2877	{montagne}
2129	{neustadt}
4283	{persone,agricoltura}
3998	{cavedago,bambini}
3859	{persone}
1703	{persone}
2048	{belfort,valle}
3034	{persone,spormaggiore}
379	{persone}
2891	{edifici,persone}
4259	{alimentazione}
2620	{molveno}
3906	{persone}
4261	{alimentazione}
3800	{persone}
3987	{cavedago,bambini}
3114	{montagne}
3260	{persone}
4322	{persone}
1162	{molveno,montagne}
494	{persone,bambini}
3015	{"funzioni religiose"}
375	{persone}
3456	{edifici}
4151	{edifici,canton,persone}
3024	{"funzioni religiose"}
3014	{"funzioni religiose"}
4511	{spormaggiore,persone}
3808	{persone}
1524	{spormaggiore}
2623	{molveno,montagne}
2084	{spormaggiore,montagne}
4486	{persone}
1486	{persone,bambini}
4637	{"servizi pubblici"}
3888	{bambini}
2746	{"funzioni religiose"}
1193	{turismo,istruzione}
2559	{molveno}
361	{spormaggiore,montagne}
1461	{molveno}
4304	{persone,benon}
489	{persone}
418	{persone}
1331	{persone}
3189	{persone}
14	{molveno}
3563	{edifici}
1753	{persone}
1557	{belfort,edifici}
2398	{boschi}
1230	{molveno}
1459	{molveno}
620	{"funzioni religiose"}
371	{belfort,edifici}
3274	{agricoltura}
1770	{persone}
1767	{feste}
2769	{cavedago}
454	{persone}
3651	{persone}
4235	{persone}
1182	{molveno,montagne}
1013	{"giochi e sport"}
3986	{cavedago,bambini}
4075	{persone}
4445	{persone}
3133	{edifici,persone}
3572	{persone}
1917	{persone}
2314	{persone,montagne}
446	{persone}
974	{"giochi e sport"}
2553	{molveno}
1472	{edifici}
690	{edifici,andalo}
1077	{edifici}
4631	{persone}
3371	{"funzioni religiose"}
2159	{belfort,edifici}
3544	{alimentazione}
3378	{uomini,cavedago}
1944	{persone,montagne}
1771	{persone}
2905	{"funzioni religiose"}
3997	{persone,montagne}
3016	{"funzioni religiose",persone}
3896	{persone}
234	{edifici,persone}
2178	{bambini}
3336	{"funzioni religiose"}
932	{persone}
1644	{edifici,montagne}
4335	{persone}
3352	{persone}
3819	{turismo}
4019	{edifici,canton,persone}
945	{andalo,montagne}
514	{istruzione}
1977	{"funzioni religiose"}
4542	{persone}
2308	{cavedago}
1606	{persone}
1231	{persone}
3303	{persone}
4218	{"funzioni religiose",persone}
1603	{istruzione}
549	{cavedago}
1335	{persone}
4258	{edifici}
3013	{"funzioni religiose",persone}
3022	{"funzioni religiose"}
3071	{emigrazione}
1228	{spormaggiore}
2772	{stoccarda}
3652	{persone}
3894	{persone,spormaggiore}
3386	{boschi,persone}
2105	{persone}
4441	{spormaggiore,persone}
2801	{istruzione}
999	{viabilità,montagne}
1940	{edifici,cortàlta}
4359	{istruzione}
4383	{belfort,edifici}
2317	{persone,bambini}
1509	{persone,montagne}
2556	{viabilità,molveno}
3231	{persone}
3523	{turismo}
1065	{montagne}
758	{persone,montagne}
3006	{"funzioni religiose"}
2794	{persone,montagne}
1271	{molveno,montagne}
2042	{belfort,edifici}
692	{viabilità,montagne}
3072	{emigrazione}
3625	{"servizi pubblici"}
3333	{"funzioni religiose"}
940	{persone}
1176	{viabilità,molveno}
2349	{montagne}
3177	{istruzione}
3938	{cavedago,bambini}
3454	{persone,feste}
2184	{belfort,edifici}
4589	{spormaggiore,persone}
694	{persone,montagne}
2037	{cavedago,"lavori maschili"}
4417	{persone}
3108	{edifici,persone}
3866	{bambini}
689	{boschi}
427	{persone}
2189	{boschi}
2566	{molveno,montagne}
2948	{donne}
447	{persone}
3326	{persone}
1471	{edifici}
2739	{persone}
4239	{istruzione}
3784	{edifici}
3112	{edifici}
2154	{istruzione}
2294	{cavedago}
4443	{persone}
1774	{"funzioni religiose"}
2368	{montagne}
3406	{edifici,montagne}
3765	{uomini}
3279	{istruzione}
691	{feste,"mezzi di trasporto",montagne}
1766	{persone}
86	{persone}
1252	{persone,spormaggiore}
4377	{persone}
3010	{"funzioni religiose"}
2858	{persone,cavedago}
3811	{cavedago}
3507	{turismo,montagne}
2567	{molveno}
3455	{persone}
3465	{fai,montagne,paganella}
1189	{molveno}
3379	{persone,cavedago}
1721	{"funzioni religiose"}
3036	{spormaggiore,persone}
4429	{persone,spormaggiore}
269	{persone}
1270	{molveno,montagne}
2473	{emigrazione}
3764	{persone,feste}
3469	{"funzioni religiose"}
1224	{viabilità}
1632	{edifici,montagne}
2814	{bambini}
2721	{molveno,montagne}
3106	{edifici}
3561	{"giochi e sport",montagne}
1109	{molveno}
1654	{edifici,montagne}
2911	{emigrazione,donne}
4611	{spormaggiore}
3209	{persone,bambini,montagne}
1369	{"servizi pubblici",montagne}
3429	{paganella}
2979	{montagne,paganella}
2492	{montagne}
3096	{bambini}
2764	{cavedago}
1468	{edifici}
4495	{spormaggiore,bambini}
2818	{cavedago}
2405	{"lavori maschili",montagne}
1511	{persone}
1543	{emigrazione}
3226	{fai,paganella}
4619	{boschi,spormaggiore}
948	{edifici,andalo}
1268	{molveno,montagne}
1460	{molveno,montagne}
2117	{turismo}
4017	{cavedago,bambini}
4504	{persone}
3763	{emigrazione}
4623	{spormaggiore}
3793	{bambini,montagne}
3983	{cavedago,bambini}
1514	{spormaggiore}
1712	{"lavori femminili"}
3029	{edifici,persone}
4452	{"funzioni religiose"}
3119	{edifici}
4166	{persone}
1515	{edifici,spormaggiore}
2564	{edifici,montagne}
2179	{spormaggiore}
2407	{persone,montagne}
4278	{"funzioni religiose"}
1032	{persone}
920	{toscana}
4237	{persone,istruzione}
4518	{spormaggiore}
1484	{persone,alimentazione}
2639	{montagne}
1592	{cavedago}
3359	{persone,donne}
3621	{turismo,"servizi pubblici"}
1187	{molveno}
3650	{persone}
2673	{boschi,molveno}
1677	{persone,montagne}
973	{belfort,edifici}
2085	{spormaggiore,montagne}
2080	{spormaggiore}
3773	{montagne}
3023	{"funzioni religiose"}
3664	{paganella}
4427	{"funzioni religiose"}
3498	{edifici,paganella}
693	{edifici,persone}
641	{istruzione}
1444	{edifici,persone}
3368	{cavedago,donne}
3744	{persone}
12	{turismo,riva}
15	{agricoltura,viabilità}
972	{edifici}
1044	{edifici}
1298	{"lavori maschili"}
3367	{cavedago}
1156	{viabilità,montagne}
3937	{cavedago,bambini}
2757	{edifici}
369	{belfort,edifici}
2432	{adige}
638	{viabilità}
73	{edifici,viabilità}
108	{allevamento,persone,bambini,montagne}
3889	{persone}
285	{edifici,cavedago,donne}
380	{bambini,emigrazione}
242	{persone,bambini}
1619	{persone}
1332	{edifici}
233	{edifici,persone}
875	{turismo,viabilità,montagne}
432	{persone}
934	{persone}
547	{spormaggiore,cavedago}
887	{turismo,montagne}
4003	{cavedago}
2094	{vienna}
776	{edifici,turismo,"giochi e sport",montagne}
3470	{edifici,turismo}
4082	{edifici,persone}
924	{edifici,persone,cavedago}
3073	{persone,alimentazione}
370	{edifici,viabilità}
227	{edifici,persone}
519	{"servizi pubblici"}
2047	{belfort,edifici}
1037	{montagne}
595	{edifici,zambana,fai}
731	{edifici,persone,crosare}
1262	{emigrazione}
2041	{belfort,edifici}
1005	{edifici,persone}
243	{alimentazione,emigrazione,montagne}
2050	{belfort}
589	{edifici,fai,zambana}
495	{viabilità}
3154	{"funzioni religiose"}
499	{persone}
594	{edifici,fai,zambana,cavedago}
497	{"lavori femminili"}
483	{"servizi pubblici"}
2552	{agricoltura,molveno}
1871	{persone,agricoltura}
1167	{"lavori maschili",emigrazione,istruzione}
1373	{persone,feste}
473	{persone}
1402	{viabilità,molveno,montagne}
3282	{bambini}
472	{persone}
4554	{spormaggiore}
4257	{persone}
3992	{persone}
3865	{persone}
550	{boschi}
1642	{edifici,persone,montagne}
841	{edifici,persone,cavedago,bambini}
774	{edifici,andalo,istruzione}
2078	{spormaggiore}
4289	{persone}
3718	{feste}
3283	{mezzolombardo}
4562	{edifici,"lavori maschili"}
2049	{montagne,belfort,edifici}
721	{persone}
3180	{"servizi pubblici"}
1565	{edifici,viabilità}
498	{persone,emigrazione}
368	{belfort,edifici,turismo}
419	{persone}
2961	{edifici,montagne}
509	{bambini,istruzione}
1395	{edifici,viabilità,molveno,montagne}
348	{edifici,turismo,andalo}
504	{persone}
882	{turismo,montagne,paganella}
3869	{edifici,turismo,paganella}
350	{turismo}
1226	{edifici}
1314	{edifici,persone}
3594	{edifici,canton,persone}
1363	{montagne,tovel,molveno}
3912	{spormaggiore}
4219	{"funzioni religiose"}
2260	{cavedago}
1215	{viabilità,"servizi pubblici"}
1396	{viabilità,molveno,montagne}
3571	{persone,cavedago}
1751	{spormaggiore,persone}
1186	{turismo,molveno,"mezzi di trasporto"}
840	{edifici,persone,"servizi pubblici"}
511	{persone}
464	{persone}
1072	{edifici,turismo,montagne}
2114	{montagne}
935	{persone}
461	{turismo,"servizi pubblici"}
4196	{persone}
671	{boschi}
1317	{molveno}
349	{edifici,turismo,andalo}
3803	{persone,feste}
1698	{edifici,persone,spiazola}
1602	{persone,cavedago,istruzione,donne}
3242	{"servizi pubblici"}
442	{"lavori femminili"}
3479	{"giochi e sport"}
1469	{edifici,viabilità}
356	{turismo,paganella}
336	{edifici,persone,feste,"servizi pubblici","mezzi di trasporto"}
702	{andalo,"mezzi di trasporto",montagne}
2166	{edifici,spormaggiore}
858	{edifici,andalo,montagne}
2077	{edifici,spormaggiore,montagne}
604	{mezzolombardo,"servizi pubblici"}
2715	{molveno,montagne}
3576	{cavedago,emigrazione}
3190	{"funzioni religiose",bambini}
3825	{edifici}
347	{turismo}
596	{edifici,turismo,andalo,montagne}
644	{viabilità}
2696	{molveno,montagne}
426	{persone}
2027	{agricoltura,cavedago}
1158	{viabilità,molveno,montagne}
560	{persone}
3253	{viabilità}
642	{spormaggiore}
3117	{allevamento,montagne}
2617	{edifici,turismo}
1133	{boschi,viabilità,molveno,montagne}
966	{"funzioni religiose",persone}
646	{"funzioni religiose"}
3860	{edifici,turismo,montagne}
725	{feste}
668	{turismo,andalo}
1135	{edifici,molveno}
1168	{turismo,montagne}
3634	{edifici,persone}
1356	{montagne}
551	{edifici,persone,cavedago,"servizi pubblici"}
4326	{persone}
1149	{turismo,andalo,montagne}
417	{edifici,persone}
667	{turismo,andalo}
1627	{edifici,persone,montagne}
605	{edifici,mezzolombardo,"servizi pubblici"}
852	{turismo,andalo,montagne}
3026	{agricoltura}
1152	{edifici,viabilità,montagne}
3525	{turismo,paganella}
2607	{"lavori femminili",persone,cavedago}
4435	{spormaggiore,feste}
1587	{persone,donne}
4000	{persone,cavedago,donne}
2611	{edifici}
1590	{persone,bambini,donne}
1382	{"funzioni religiose",persone}
1537	{edifici}
995	{edifici,andalo,montagne}
3251	{viabilità}
372	{belfort,edifici,viabilità}
1323	{agricoltura,molveno,"giochi e sport"}
1976	{"funzioni religiose"}
4303	{spormaggiore}
1096	{agricoltura,viabilità,montagne}
941	{spormaggiore,trento}
3783	{istruzione}
1598	{persone,cavedago,istruzione}
1258	{persone}
1473	{edifici,viabilità}
1389	{turismo,molveno,"mezzi di trasporto",montagne}
2081	{edifici,spormaggiore}
675	{"mezzi di trasporto",andalo,montagne}
1063	{viabilità,"servizi pubblici"}
2019	{edifici}
712	{edifici,feste,istruzione}
1124	{edifici,"servizi pubblici"}
1789	{edifici,"funzioni religiose"}
1110	{boschi,viabilità,molveno,montagne}
1111	{edifici,viabilità,molveno}
1140	{edifici,molveno,montagne}
1216	{viabilità,"servizi pubblici"}
2062	{donne,"giochi e sport",belfort,edifici}
1126	{agricoltura,molveno,ischia}
3776	{persone}
609	{turismo,andalo,montagne}
1131	{edifici,viabilità,montagne}
1569	{spormaggiore,viabilità}
2255	{edifici,persone,bambini}
611	{edifici,boschi,viabilità,montagne}
1689	{edifici,persone,feste,"servizi pubblici","mezzi di trasporto"}
1218	{bambini}
1609	{persone,istruzione}
2187	{persone}
3861	{edifici,turismo,montagne}
1273	{persone,cavedago}
3254	{viabilità}
4555	{spormaggiore}
669	{venezia,cadore,turismo}
1260	{persone}
3560	{agricoltura,"giochi e sport",montagne}
3162	{bambini}
2893	{edifici,alberghi}
1607	{persone,cavedago,istruzione}
4422	{persone,spormaggiore}
996	{edifici,andalo,montagne,istruzione}
949	{cortalta,fai,montagne,paganella}
3636	{toscana}
866	{paganella,turismo}
3480	{persone,fai}
1353	{turismo,agricoltura,viabilità,molveno}
856	{turismo,andalo,montagne}
886	{edifici,turismo,andalo,montagne}
1229	{edifici,viabilità,"servizi pubblici"}
1289	{edifici,molveno}
1397	{molveno}
876	{turismo,andalo,montagne}
1214	{viabilità,"servizi pubblici"}
1637	{edifici,persone,montagne}
1233	{edifici,spormaggiore,"servizi pubblici"}
2107	{montagne}
3541	{edifici,persone,cavedago}
1241	{agricoltura,molveno,"giochi e sport"}
1155	{viabilità,molveno,montagne}
976	{edifici,andalo,montagne,istruzione}
2265	{edifici,persone,cavedago}
1663	{edifici,persone,montagne}
798	{edifici,persone}
1180	{molveno,montagne}
1664	{persone,agricoltura,montagne}
1594	{edifici,persone}
929	{edifici,uomini,persone,bambini,donne}
4582	{spormaggiore,persone}
1128	{edifici,boschi,agricoltura,viabilità,molveno,montagne}
2900	{edifici,turismo}
1612	{trento,istruzione}
1604	{edifici,persone}
1263	{molveno,montagne}
1170	{montagne,turismo,molveno}
870	{montagne,turismo,molveno}
2059	{belfort,edifici,spormaggiore}
1164	{agricoltura,molveno,"giochi e sport"}
1481	{turismo,andalo,montagne}
1507	{edifici,persone,toscana}
1596	{cavedago}
4604	{persone}
3726	{uomini,cavedago,donne}
1686	{persone,"servizi pubblici"}
1660	{persone}
1343	{fai,feste,cavedago,donne}
2275	{voralberg,austria}
3296	{istruzione}
1390	{montagne,agricoltura,viabilità,molveno}
3098	{"lavori femminili",montagne}
3037	{persone}
2220	{boschi}
1188	{viabilità,molveno,"giochi e sport",montagne}
4424	{persone}
1635	{edifici,persone,montagne}
3227	{boschi,persone}
4594	{"servizi pubblici"}
1648	{"giochi e sport",edifici,feste,cavedago}
1622	{edifici,persone,toscana,montagne}
3911	{spormaggiore}
1394	{edifici,turismo}
1662	{edifici,persone,montagne}
1575	{edifici}
1249	{edifici,persone}
1316	{edifici,turismo}
1765	{belfort,edifici,persone}
2056	{belfort,edifici}
834	{persone,turismo,molveno,"mezzi di trasporto",montagne,"giochi e sport"}
4553	{"funzioni religiose"}
1094	{edifici,agricoltura,turismo,montagne}
1153	{edifici,viabilità,molveno,montagne}
1319	{agricoltura,molveno}
3236	{"funzioni religiose",bambini}
1185	{"mezzi di trasporto",montagne,edifici,turismo,molveno}
3179	{"lavori femminili",bambini}
1474	{boschi,viabilità}
1203	{persone,spormaggiore,benešov,turismo}
1659	{persone}
2025	{edifici,persone,cavedago,montagne}
867	{montagne,trento,valle,zambana,turismo}
2921	{persone}
1401	{agricoltura,viabilità,molveno}
2372	{cavedago}
1888	{turismo,andalo,montagne}
872	{edifici,zambana,turismo}
1599	{persone,cavedago}
1154	{viabilità,molveno,montagne}
1179	{edifici,"servizi pubblici",molveno}
3100	{edifici}
1605	{persone,montagne}
2145	{belfort,edifici}
1568	{edifici,viabilità}
2367	{persone,"mezzi di trasporto"}
1645	{persone,toscana}
1085	{edifici,andalo}
1652	{edifici,persone,toscana}
2067	{agricoltura}
1264	{"mezzi di trasporto",molveno,montagne}
1633	{edifici,persone}
1556	{belfort,edifici,valle}
2369	{persone,"lavori femminili"}
1738	{turismo,viabilità,montagne}
1560	{sporo,belfort,edifici}
1139	{edifici,montagne}
1243	{agricoltura,molveno,"giochi e sport"}
1551	{persone,"lavori maschili"}
3649	{persone}
1600	{edifici,persone,bambini,donne}
2057	{belfort,edifici}
1294	{turismo,molveno,montagne}
1623	{edifici,persone,toscana,montagne}
1638	{edifici,persone}
2292	{persone,montagne}
4389	{"servizi pubblici"}
1980	{persone,toscana,"lavori femminili"}
2291	{edifici,persone}
2058	{belfort,edifici,spormaggiore}
1611	{haidinger,"servizi pubblici",salzburg}
2083	{spormaggiore,viabilità}
1628	{edifici,persone,toscana,montagne}
1629	{edifici,persone,toscana,montagne}
1640	{edifici,persone,montagne}
1714	{spormaggiore,feste,turismo,viabilità}
1994	{edifici,agricoltura,montagne}
3473	{edifici,turismo,cavedago}
2379	{persone,cavedago}
1719	{edifici,spormaggiore,istruzione,agricoltura,viabilità,montagne}
3684	{edifici,donne,cavedago}
1776	{bambini,cavedago}
1860	{edifici,turismo,andalo,montagne}
2086	{edifici,spormaggiore}
3360	{edifici,persone,"servizi pubblici",donne}
2240	{persone,feste,priori,boschi,"lavori femminili"}
2017	{persone,cavedago}
1715	{spormaggiore,feste,turismo,viabilità}
2895	{montagne}
2180	{edifici,spormaggiore,montagne}
2259	{edifici,fai,cortalta}
1791	{spormaggiore}
2882	{edifici,persone}
2297	{persone,bambini}
1942	{"funzioni religiose"}
4463	{spormaggiore,persone,benon}
3575	{persone,cavedago,montagne}
2060	{belfort,edifici,spormaggiore}
2434	{adige}
2427	{edifici,persone,cavedago}
2249	{persone,"lavori femminili",cavedago}
2000	{persone}
3164	{edifici}
2638	{edifici,"servizi pubblici",molveno,montagne}
2247	{"funzioni religiose",bambini,cavedago}
2152	{agricoltura}
1783	{bozen,obstplatz}
2690	{molveno}
1786	{edifici,"funzioni religiose",persone}
3933	{persone,trento,cavedago}
1975	{"funzioni religiose",andalo}
2511	{boschi,turismo,paganella,montagne}
2419	{edifici,bambini,canton,cavedago}
1973	{"funzioni religiose",andalo}
1939	{persone}
2526	{turismo,montagne}
3646	{edifici,persone,toscana}
2610	{"mezzi di trasporto","caccia e pesca",molveno,montagne}
3278	{edifici,mezzolombardo}
2682	{edifici,molveno}
2781	{edifici,persone}
2662	{persone,cavedago}
1971	{"funzioni religiose",andalo}
1950	{boschi,agricoltura,viabilità}
2863	{edifici,mezzolombardo,istruzione,cavedago}
3287	{edifici,persone,bambini}
2130	{agricoltura}
1853	{viabilità}
3807	{persone}
3191	{garda,edifici,"funzioni religiose",riva,cavedago}
2996	{edifici,persone,boschi,andalo,montagne}
2439	{adige}
2066	{persone,bambini,donne,"lavori femminili"}
2331	{persone,toscana,"lavori femminili"}
2235	{"servizi pubblici",istruzione}
2399	{edifici}
3222	{persone,montagne}
3054	{persone,toscana}
2462	{persone}
3452	{edifici,persone,bambini}
2621	{montagne,edifici,agricoltura,molveno}
3215	{persone,cavedago}
3289	{edifici,persone}
3075	{persone,alimentazione}
4333	{persone,spormaggiore,feste}
2837	{persone,bambini,donne}
2055	{sarca,strumenti,massenza,viabilità,"lavori maschili",molveno}
2252	{"funzioni religiose",bambini,cavedago}
2654	{edifici,"servizi pubblici",cavedago}
4523	{persone}
3735	{persone}
2834	{edifici,persone,istruzione,cavedago}
4312	{persone,"lavori femminili"}
4170	{edifici,viabilità,meano}
2263	{persone,emigrazione,cavedago}
4510	{spormaggiore,persone}
3709	{persone,istruzione,"lavori femminili"}
2926	{edifici,persone}
3755	{"lavori femminili"}
3126	{edifici,ori,montagne}
3255	{viabilità}
2079	{edifici,spormaggiore,"servizi pubblici",viabilità}
2760	{edifici,"servizi pubblici",romedio}
2625	{turismo,molveno,montagne}
2941	{edifici,persone,istruzione}
2438	{bambini,cavedago}
2289	{edifici,feste,istruzione,boschi,cavedago}
3824	{edifici}
2261	{persone,cavedago}
3160	{edifici,persone}
2666	{edifici,turismo,andalo,montagne}
2489	{"funzioni religiose",bambini}
2332	{persone,"lavori femminili"}
2401	{priori,agricoltura,"giochi e sport"}
4442	{edifici,persone,"servizi pubblici"}
2762	{edifici,persone,canton,cavedago,montagne}
3067	{istruzione}
3051	{"funzioni religiose",persone}
2860	{persone}
2596	{turismo,andalo,montagne}
4621	{persone,mezzolombardo,istruzione}
3163	{persone,montagne}
2833	{edifici,persone,istruzione}
2380	{persone,toscana,cavedago}
2381	{"funzioni religiose",persone,feste,donne,"lavori femminili",cavedago}
3857	{persone,bambini}
3365	{edifici,canton}
2677	{persone,cavedago}
2400	{priori,agricoltura,"giochi e sport"}
2402	{priori,agricoltura,"giochi e sport"}
3529	{fai,boschi,montagne}
2484	{cavedago}
3249	{boschi,montagne}
3362	{edifici,canton}
4004	{persone,"servizi pubblici",donne}
3566	{istruzione,cavedago}
2406	{"funzioni religiose",persone,"lavori femminili"}
2652	{turismo,andalo,montagne}
3361	{edifici,canton}
4470	{"funzioni religiose",spormaggiore}
3569	{feste,priori,boschi,canton}
3044	{persone,"lavori femminili",montagne}
2478	{edifici,"funzioni religiose",persone,feste,cavedago,"giochi e sport"}
2608	{viabilità,montagne}
1416	{spormaggiore,persone}
2431	{adige}
2485	{feste,"lavori femminili",cavedago}
2778	{persone,cavedago,montagne}
2685	{riva,molveno,montagne}
2622	{edifici,persone,donne}
4240	{edifici,persone,bambini}
2444	{adige}
2518	{"servizi pubblici",turismo,paganella}
2647	{edifici,boschi,viabilità,montagne}
3645	{persone}
4522	{persone,"servizi pubblici",donne,montagne}
3074	{persone,alimentazione}
3083	{edifici,persone}
2782	{persone,feste,priori,boschi}
2656	{edifici,molveno}
4509	{persone,montagne}
2983	{paganella}
3355	{"lavori femminili",cavedago}
3538	{edifici,persone,emigrazione,cavedago}
4314	{persone,"lavori femminili"}
2989	{andalo}
3786	{persone,montagne}
1779	{persone}
3615	{edifici,trento,turismo,paganella}
2827	{"funzioni religiose",persone,cavedago}
3210	{viabilità,cavedago,montagne}
4277	{"funzioni religiose"}
2671	{boschi,viabilità,molveno,montagne}
2675	{boschi,agricoltura,turismo,molveno,montagne}
2697	{persone,molveno,"giochi e sport",montagne}
2701	{viabilità,molveno,montagne}
2940	{cavedago,paganella}
3335	{istruzione,andalo}
2603	{persone,feste,priori,boschi}
3048	{"funzioni religiose",persone}
4346	{persone}
3050	{"funzioni religiose",persone}
2698	{persone,agricoltura,cavedago,"giochi e sport"}
2943	{persone,bambini,donne}
3422	{"funzioni religiose",bambini}
2850	{edifici,persone,boschi,turismo,andalo,montagne}
3999	{persone,cavedago}
3977	{persone,bambini,cavedago}
2441	{adige}
3130	{edifici}
3033	{boschi,turismo,montagne}
2861	{persone,turismo,montagne}
2789	{persone,bambini,"lavori femminili",cavedago}
4001	{persone,donne,cavedago}
3464	{turismo,andalo,montagne}
3144	{persone,bambini,boschi,viabilità,montagne}
3206	{garda,riva,cavedago}
3781	{edifici,"lavori femminili"}
2822	{belfort,edifici,spormaggiore,persone}
4021	{donne,agricoltura,cavedago,montagne}
2988	{andalo}
4129	{edifici,agricoltura,montagne}
3692	{edifici,palù,fai,cortàlta,ori,paganella,montagne}
3052	{persone,"lavori femminili",montagne}
4344	{persone,istruzione,boschi}
4317	{edifici,persone,montagne}
4152	{edifici,cavedago}
4334	{bambini,donne}
3066	{persone,"lavori femminili"}
4311	{persone,spormaggiore}
4362	{persone}
4532	{"funzioni religiose",spormaggiore,feste}
3363	{edifici,canton}
3562	{persone,cavedago,montagne}
3593	{persone,cavedago}
3908	{paganella,montagne}
2436	{adige}
2812	{persone,feste,bambini,priori,boschi}
3187	{cavedago}
3689	{feste,boschi,cavedago}
2942	{edifici}
3246	{edifici,fai,boschi,montagne}
3212	{persone,bambini,montagne}
3564	{persone,cavedago}
3530	{trento,turismo,montagne}
3268	{trento}
3109	{edifici,bambini,boschi,montagne}
3935	{trento,alimentazione,cavedago}
3288	{persone,istruzione,boschi}
3356	{"lavori femminili",cavedago}
3727	{persone,riva,donne,cavedago}
3597	{feste,"servizi pubblici"}
3228	{"funzioni religiose",persone}
3620	{trento,"servizi pubblici",turismo}
3270	{montagne,edifici,trento,turismo}
3207	{persone,montagne}
4517	{spormaggiore,persone}
3637	{persone,"servizi pubblici","mezzi di trasporto"}
1555	{belfort,edifici,valle}
3198	{"funzioni religiose",riva,cavedago}
3856	{persone,bambini}
3213	{edifici,riva,istruzione,cavedago}
3612	{edifici,trento,turismo,paganella}
2437	{adige}
3418	{edifici,persone}
3858	{persone,bambini}
3486	{edifici,bambini,istruzione,agricoltura,"giochi e sport"}
3577	{fai,montagne,paganella}
4002	{persone,donne,cavedago}
3216	{persone,bambini}
4337	{persone}
3508	{adige}
3410	{edifici,persone,emigrazione,cavedago}
1777	{persone}
4161	{"funzioni religiose",spormaggiore}
4356	{edifici,spormaggiore,persone}
4533	{"funzioni religiose",spormaggiore}
4430	{istruzione}
4016	{edifici,persone,canton}
3890	{"funzioni religiose",spormaggiore,persone}
3417	{edifici,persone,"servizi pubblici",donne,cavedago}
3462	{"funzioni religiose",persone}
3759	{istruzione,"lavori femminili"}
3950	{persone,boschi}
3818	{persone}
3578	{feste,"mezzi di trasporto",istruzione,"lavori femminili",andalo,montagne}
2430	{adige}
3921	{"funzioni religiose",spormaggiore,persone}
3579	{feste,"mezzi di trasporto",istruzione,"lavori femminili",andalo,montagne}
4067	{edifici,persone,montagne}
3224	{persone,bambini}
4414	{persone,spormaggiore}
4302	{persone,"giochi e sport"}
2443	{adige}
3746	{turismo,montagne}
2440	{adige}
3591	{persone,istruzione,"lavori femminili",andalo,montagne}
4514	{persone,spormaggiore}
4373	{spormaggiore,persone,bambini}
3790	{edifici,persone}
3280	{edifici,mezzolombardo}
3761	{istruzione,"lavori femminili"}
3979	{persone,bambini,cavedago}
2631	{"funzioni religiose",persone,cavedago}
4407	{persone}
1411	{edifici,spormaggiore,persone}
4624	{persone}
257	{edifici,persone}
2433	{adige}
3635	{edifici,persone,feste}
3175	{persone,bambini,istruzione}
4148	{persone,uomini,"servizi pubblici",donne,cavedago}
3629	{feste,paganella}
3638	{persone,"servizi pubblici","mezzi di trasporto"}
3719	{cavedago,andalo,"giochi e sport"}
3777	{persone,svizzera,montagne}
3782	{edifici,persone}
4357	{edifici,spormaggiore,bambini,montagne}
3673	{feste,priori,boschi,cavedago}
3787	{edifici,persone,montagne}
3554	{edifici,cortalta,turismo,montagne}
4477	{persone,spormaggiore}
2630	{"funzioni religiose",persone,cavedago}
3691	{turismo,montagne,paganella}
3428	{"servizi pubblici",istruzione}
4222	{persone,feste,istruzione,boschi}
4647	{"giochi e sport",spormaggiore,agricoltura}
4601	{belfort,edifici}
3730	{persone,cavedago}
4318	{persone,montagne}
4474	{persone,spormaggiore,"servizi pubblici"}
2624	{"funzioni religiose",persone,cavedago}
4169	{edifici}
4535	{spormaggiore}
3873	{"funzioni religiose",persone}
4497	{belfort,edifici,persone,spormaggiore}
3978	{spormaggiore,persone,bambini,cavedago}
4315	{edifici,feste,meano}
3284	{istruzione,paganella}
4646	{spormaggiore,feste,agricoltura,"giochi e sport"}
3195	{edifici,persone,montagne}
3683	{turismo,montagne,paganella}
4238	{donne}
3614	{edifici,trento,turismo,paganella}
3870	{"funzioni religiose",persone,bambini,"servizi pubblici",cavedago}
3871	{"funzioni religiose",persone,cavedago}
4457	{spormaggiore,persone}
3898	{"funzioni religiose",spormaggiore,persone}
4207	{persone}
3628	{edifici,trento,turismo,montagne}
4406	{spormaggiore,persone,montagne}
4072	{persone,valle,montagne}
159	{edifici,persone}
3617	{paganella,edifici,"servizi pubblici",turismo}
2445	{adige}
4464	{"funzioni religiose",spormaggiore,persone}
4255	{persone,agricoltura}
4576	{"funzioni religiose",persone,spormaggiore}
4360	{persone,istruzione}
4156	{fai,cavedago}
839	{edifici,spormaggiore,cavedago,montagne}
4564	{persone}
1475	{persone}
3758	{edifici,persone,feste}
3232	{persone,dermulo}
4197	{persone}
4316	{persone,montagne}
1621	{persone}
3616	{edifici,trento,"servizi pubblici",turismo}
1675	{persone}
3682	{turismo,paganella,montagne}
1655	{persone}
4343	{spormaggiore,feste,carnevale}
4483	{edifici,spormaggiore,persone,trento,nisclaia,viabilità,montagne}
4577	{"funzioni religiose",persone,spormaggiore}
4399	{spormaggiore,persone,montagne}
3549	{turismo,paganella}
4198	{persone}
3252	{mezzolombardo,viabilità}
3478	{"giochi e sport",paganella}
3218	{edifici,persone,bambini,"mezzi di trasporto"}
4645	{spormaggiore,feste,agricoltura,"giochi e sport"}
4593	{belfort,edifici,persone}
3510	{mezzolombardo,turismo,paganella,montagne}
3548	{turismo,paganella}
4251	{edifici,uomini,agricoltura}
4279	{spormaggiore,persone}
3241	{"funzioni religiose",bambini}
4434	{"funzioni religiose",persone,spormaggiore}
4609	{spormaggiore,"caccia e pesca"}
1006	{persone,cavedago}
4412	{spormaggiore}
4201	{persone}
3613	{edifici,turismo,paganella}
1941	{persone,cortalta,turismo}
4363	{edifici,donne}
3555	{edifici,cortalta,turismo,montagne}
3686	{vigolana,turismo,paganella,montagne}
4159	{"funzioni religiose",feste,alimentazione}
3907	{edifici,turismo,agricoltura,paganella,montagne}
3623	{edifici,trento,turismo,montagne}
4425	{"funzioni religiose",persone}
1256	{persone,feste,bambini,istruzione}
3202	{persone,abbigliamento,feste}
491	{persone,abbigliamento}
3794	{persone,abbigliamento,istruzione}
1615	{edifici,persone,abbigliamento,donne}
1595	{edifici,persone,abbigliamento,donne}
812	{persone,abbigliamento,cavedago}
1549	{persone,fai,abbigliamento,feste,cavedago,montagne}
2023	{persone,abbigliamento,emigrazione,cavedago}
1597	{persone,abbigliamento,feste,istruzione,cavedago}
1616	{persone,abbigliamento,istruzione}
1992	{persone,abbigliamento,cavedago}
2740	{persone,abbigliamento,turismo,montagne}
2577	{montagne,edifici,alberghi}
3392	{edifici,alberghi}
4640	{edifici,alberghi}
733	{edifici,alberghi,"giochi e sport"}
1897	{edifici,alberghi,persone}
3550	{edifici,alberghi,turismo,paganella,montagne}
4250	{persone,bambini,istruzione}
3310	{persone,bambini,istruzione}
2307	{animali,allevamento,cavedago}
3042	{animali,allevamento}
2659	{edifici,"edifici religiosi",boschi,turismo,agricoltura,viabilità,andalo,montagne,"giochi e sport"}
3116	{strumenti,agricoltura}
1930	{persone,alpinismo,montagne}
1553	{bambini,istruzione}
3318	{animali,allevamento,bambini}
1159	{edifici,"mezzi di trasporto",viabilità,montagne}
2684	{montagne,edifici,riva,molveno}
1398	{edifici,alberghi,agricoltura,viabilità}
1978	{alpinismo,montagne}
1349	{edifici,persone,abbigliamento,cavedago}
2785	{persone,abbigliamento,cavedago}
4499	{persone,spormaggiore,abbigliamento,"servizi pubblici"}
743	{uomini,boschi,mestieri,"lavori maschili"}
3146	{persone,abbigliamento,bambini}
425	{persone,"caccia e pesca"}
1010	{edifici,persone,"servizi pubblici","caccia e pesca",cavedago}
2248	{edifici,persone,"caccia e pesca",cavedago,viabilità,montagne}
2633	{persone,uomini,abbigliamento,bambini,"lavori femminili",cavedago}
4506	{"mezzi di trasporto",viabilità}
1290	{edifici,"edifici religiosi",molveno}
2724	{montagne,edifici,"edifici religiosi",molveno}
627	{persone,bambini,istruzione,montagne}
666	{edifici,"edifici religiosi",sanità,istruzione,andalo}
771	{edifici,"edifici religiosi",boschi,agricoltura,turismo,viabilità,andalo,montagne,"giochi e sport"}
1358	{edifici,"edifici religiosi",molveno,montagne}
1184	{edifici,"edifici religiosi",molveno}
1114	{edifici,"edifici religiosi",boschi,agricoltura,turismo,viabilità,andalo,montagne,"giochi e sport"}
1116	{edifici,"edifici religiosi",boschi,turismo,agricoltura,viabilità,andalo,"giochi e sport",montagne}
1687	{edifici,"edifici religiosi",sanità,istruzione,andalo}
2902	{persone,feste,bambini,istruzione,boschi}
2658	{edifici,"edifici religiosi",boschi,turismo,agricoltura,viabilità,andalo,"giochi e sport",montagne}
2119	{edifici,"edifici religiosi",andalo}
2120	{edifici,"edifici religiosi",boschi,andalo,montagne}
2121	{edifici,"edifici religiosi",boschi,andalo,montagne}
2302	{animali,"caccia e pesca"}
2299	{animali,persone,bambini,"caccia e pesca"}
2913	{edifici,animali,"caccia e pesca"}
3788	{edifici,animali,persone,"caccia e pesca"}
1630	{edifici,"edifici religiosi"}
344	{edifici,"edifici religiosi",spormaggiore,feste,andalo}
1684	{edifici,"edifici religiosi",spormaggiore,feste,andalo}
2842	{edifici,"edifici religiosi",spormaggiore,feste,andalo}
3679	{edifici,"edifici religiosi"}
3384	{edifici,"edifici religiosi","funzioni religiose",bambini}
3332	{edifici,"edifici religiosi","funzioni religiose",feste}
1792	{persone,religiosi}
3204	{venezia,persone,religiosi}
4610	{persone,spormaggiore,abbigliamento}
522	{animali,allevamento}
4551	{persone,spormaggiore,abbigliamento,agricoltura}
1804	{persone,abbigliamento}
244	{animali,allevamento}
2912	{edifici,arsié,animali,allevamento}
4465	{spormaggiore,feste,carnevale}
3243	{feste,carnevale}
3463	{feste,carnevale}
3431	{feste,carnevale}
1904	{spormaggiore,feste,alimentazione,carnevale}
2640	{edifici,persone,carnevale,feste,istruzione}
2634	{edifici,persone,feste,carnevale,bambini}
4466	{spormaggiore,feste,carnevale}
2068	{"mezzi di trasporto",agricoltura,viabilità}
4641	{"servizi pubblici","mezzi di trasporto",viabilità}
4298	{"mezzi di trasporto",viabilità}
4638	{edifici,"mezzi di trasporto",viabilità}
4608	{"mezzi di trasporto",viabilità}
2064	{"mezzi di trasporto",viabilità}
1581	{bambini,"mezzi di trasporto",viabilità}
1527	{"mezzi di trasporto",agricoltura,viabilità}
1580	{persone,"mezzi di trasporto",agricoltura,viabilità,montagne}
2802	{persone,"mezzi di trasporto",cavedago,viabilità}
3849	{"mezzi di trasporto",viabilità,montagne}
1567	{edifici,animali,allevamento,uomini,"mezzi di trasporto",viabilità}
1850	{"mezzi di trasporto",viabilità}
2267	{"mezzi di trasporto",viabilità}
1949	{"mezzi di trasporto",viabilità}
2225	{feste,carnevale,"mezzi di trasporto",viabilità}
4248	{edifici,allevamento,spormaggiore,istruzione}
4268	{boschi,"lavori maschili"}
3161	{strumenti,boschi,"lavori maschili"}
439	{edifici,alberghi}
1924	{animali,allevamento}
4468	{animali,allevamento}
4491	{animali,allevamento,"servizi pubblici"}
3804	{animali,allevamento,persone}
2010	{animali,allevamento}
2955	{sicilia,animali,allevamento}
1903	{animali,allevamento,persone,turismo}
1931	{animali,allevamento,"giochi e sport"}
2465	{animali,allevamento,persone,emigrazione}
3659	{animali,allevamento,"giochi e sport"}
1938	{edifici,animali,allevamento,persone,bambini,turismo}
4636	{animali,allevamento,feste,"mezzi di trasporto",viabilità}
4591	{edifici,"edifici religiosi"}
2947	{edifici,"edifici religiosi","funzioni religiose",toscana,"lavori femminili"}
3639	{edifici,"edifici religiosi","funzioni religiose",toscana,"lavori femminili"}
4266	{edifici,"edifici religiosi"}
1518	{edifici,"edifici religiosi"}
1517	{edifici,"edifici religiosi"}
1519	{edifici,"edifici religiosi"}
2150	{edifici,"edifici religiosi"}
1291	{edifici,"edifici religiosi",viabilità,molveno}
2563	{edifici,"edifici religiosi"}
2546	{edifici,"edifici religiosi"}
2550	{edifici,"edifici religiosi",molveno}
2575	{edifici,"edifici religiosi",molveno}
2018	{edifici,"edifici religiosi"}
1269	{edifici,"edifici religiosi",molveno}
1352	{edifici,"edifici religiosi",molveno,montagne}
4606	{edifici,"edifici religiosi",spormaggiore}
1462	{edifici,"edifici religiosi",molveno}
720	{edifici,"edifici religiosi"}
1463	{edifici,"edifici religiosi",turismo,molveno}
1236	{edifici,"edifici religiosi",molveno}
985	{edifici,"edifici religiosi",istruzione,andalo,montagne}
1055	{edifici,"edifici religiosi","servizi pubblici",montagne}
1234	{edifici,"edifici religiosi",molveno}
1293	{edifici,"edifici religiosi",europa,molveno,montagne}
1320	{edifici,"edifici religiosi",molveno,montagne}
1388	{edifici,"edifici religiosi","mezzi di trasporto",molveno}
1266	{edifici,"edifici religiosi",riva,turismo,molveno,montagne}
1318	{edifici,"edifici religiosi",molveno,montagne}
4256	{edifici,"edifici religiosi"}
3427	{edifici,"edifici religiosi",viabilità,"giochi e sport"}
1794	{edifici,"edifici religiosi","funzioni religiose"}
2561	{edifici,"edifici religiosi","servizi pubblici",istruzione}
618	{persone,bambini,istruzione}
4521	{edifici,"edifici religiosi",spormaggiore}
2547	{edifici,"edifici religiosi",agricoltura,molveno,montagne}
2548	{edifici,"edifici religiosi",agricoltura,molveno,montagne}
4569	{edifici,"edifici religiosi",spormaggiore}
4176	{edifici,"edifici religiosi",spormaggiore,turismo}
4519	{edifici,"edifici religiosi",persone}
4592	{edifici,"edifici religiosi",spormaggiore}
4520	{edifici,"edifici religiosi",spormaggiore,persone,bambini}
4494	{edifici,"edifici religiosi",spormaggiore}
4254	{edifici,"edifici religiosi",persone,agricoltura}
1272	{montagne,edifici,"edifici religiosi",alberghi}
2549	{edifici,"edifici religiosi",montagne}
4253	{edifici,"edifici religiosi",animali,allevamento,spormaggiore,persone,"mezzi di trasporto",viabilità}
559	{edifici,"edifici religiosi",feste}
1324	{edifici,"edifici religiosi",agricoltura,molveno,"giochi e sport"}
830	{montagne,edifici,"edifici religiosi",boschi,turismo}
1312	{persone,bambini,istruzione}
1915	{edifici,"edifici religiosi",persone,abbigliamento}
252	{edifici,"edifici religiosi","funzioni religiose",persone,spormaggiore,bambini}
4492	{edifici,"edifici religiosi",persone}
256	{edifici,"edifici religiosi",persone,emigrazione}
4323	{edifici,"edifici religiosi"}
2723	{edifici,"edifici religiosi",molveno}
1752	{edifici,"edifici religiosi",bambini,istruzione,viabilità}
2899	{"funzioni religiose",persone}
2642	{montagne,edifici,alberghi}
219	{edifici,"edifici religiosi",priori,cavedago,viabilità,andalo}
2878	{edifici,"edifici religiosi"}
1728	{edifici,"edifici religiosi",spormaggiore,viabilità}
632	{persone,bambini,istruzione}
962	{andalo,paganella,edifici,"edifici religiosi",istruzione}
456	{persone,bambini,istruzione}
1531	{persone,feste,bambini,istruzione}
1419	{persone,feste,bambini,istruzione}
475	{persone,bambini,istruzione}
1313	{persone,bambini,istruzione}
4639	{persone,bambini,istruzione}
637	{persone,bambini,istruzione}
1530	{persone,feste,bambini,istruzione}
2957	{"funzioni religiose",persone,bambini,istruzione}
4294	{persone,bambini,istruzione}
2102	{persone,bambini,istruzione}
1407	{persone,feste,bambini,istruzione}
626	{persone,bambini,istruzione}
440	{persone,bambini,istruzione}
1532	{persone,feste,bambini,istruzione}
1533	{persone,feste,bambini,istruzione}
636	{persone,bambini,istruzione,montagne}
2141	{persone,feste,bambini,istruzione}
628	{persone,bambini,istruzione}
520	{persone,bambini,istruzione,"lavori femminili"}
631	{persone,bambini,istruzione,"lavori femminili"}
2076	{persone,feste,bambini,istruzione}
1535	{persone,feste,bambini,istruzione,montagne}
1711	{persone,feste,bambini,istruzione}
1534	{persone,feste,bambini,istruzione}
2377	{"funzioni religiose",persone,bambini,istruzione,cavedago}
1768	{persone,bambini,istruzione,"lavori femminili"}
2215	{"funzioni religiose",persone,alimentazione,bambini,istruzione}
2376	{"funzioni religiose",persone,bambini,istruzione,"lavori femminili",cavedago}
2134	{"funzioni religiose",persone,feste,bambini,istruzione}
2228	{persone,bambini,istruzione}
2214	{persone,alimentazione,bambini,istruzione}
2142	{persone,feste,bambini,istruzione}
3086	{persone,feste,bambini,istruzione,andalo}
2867	{persone,bambini,istruzione,canton}
2446	{"funzioni religiose",persone,bambini,istruzione,cavedago}
2217	{"funzioni religiose",persone,alimentazione,bambini,toscana,istruzione}
2232	{persone,bambini,toscana,istruzione}
1943	{persone,feste,bambini,istruzione}
2953	{"funzioni religiose",persone,bambini,istruzione,"lavori femminili"}
3733	{persone,bambini,istruzione,canton}
3654	{persone,alimentazione,bambini,istruzione}
2901	{"funzioni religiose",persone,bambini,istruzione}
3704	{"funzioni religiose",persone,bambini,istruzione,cavedago}
4453	{"funzioni religiose",persone,spormaggiore,feste,bambini,istruzione}
4433	{"funzioni religiose",persone,bambini,istruzione}
1201	{persone,abbigliamento,bambini,istruzione}
1406	{edifici,"edifici religiosi","funzioni religiose",persone,bambini,istruzione}
2136	{edifici,"edifici religiosi",persone,bambini,istruzione}
2233	{persone,bambini,istruzione,"lavori femminili"}
1329	{persone,"mezzi di trasporto",viabilità,"giochi e sport"}
3966	{persone,donne,"lavori femminili",cavedago}
4451	{"funzioni religiose",persone,spormaggiore,donne,"lavori femminili"}
981	{montagne,paganella,edifici,alberghi}
1045	{paganella,edifici,alberghi}
232	{edifici,allevamento,persone,mestieri,agricoltura,viabilità}
722	{allevamento,persone,trento,istruzione,mestieri,agricoltura}
230	{edifici,persone,"mezzi di trasporto",mestieri,canton,agricoltura,viabilità}
470	{edifici,"edifici religiosi"}
1383	{edifici,persone,"servizi pubblici"}
1405	{edifici,spormaggiore,persone,"servizi pubblici"}
2132	{coscritti,uomini,persone,feste}
3182	{coscritti,uomini,persone,agricoltura}
1280	{coscritti,uomini,persone,"lavori femminili"}
3235	{coscritti,uomini,persone}
1333	{coscritti,uomini,persone}
3148	{coscritti,uomini,persone}
3173	{coscritti,uomini,persone}
2475	{coscritti,uomini,persone,cavedago}
1421	{coscritti,uomini,persone,feste}
2669	{coscritti,uomini,persone,feste,priori,boschi,cavedago}
3223	{coscritti,uomini,persone,feste,priori,boschi,cavedago}
3829	{bedolè,coscritti,uomini,persone,cavedago,montagne,"giochi e sport"}
4536	{coscritti,uomini,persone,spormaggiore}
1278	{coscritti,uomini,persone,bambini,istruzione}
2883	{coscritti,uomini,persone,bambini,istruzione}
318	{coscritti,uomini,persone,bambini,"servizi pubblici",istruzione,"lavori femminili",andalo}
467	{coscritti,uomini,persone,bambini,istruzione}
327	{coscritti,uomini,persone,bambini,toscana,istruzione,"lavori femminili"}
4575	{coscritti,uomini,persone,feste,bambini,istruzione}
325	{coscritti,uomini,persone,bambini,istruzione}
4214	{coscritti,uomini,persone,feste,bambini,istruzione}
1239	{coscritti,uomini,persone,feste,bambini,istruzione}
4173	{coscritti,uomini,persone,feste,bambini,istruzione}
1681	{coscritti,uomini,persone,bambini,istruzione}
750	{coscritti,uomini,persone,bambini,toscana,istruzione,"lavori femminili"}
4456	{coscritti,uomini,persone,feste,bambini,istruzione}
753	{coscritti,uomini,persone,bambini,istruzione}
746	{coscritti,uomini,persone,bambini,istruzione,"lavori femminili"}
1680	{coscritti,uomini,persone,bambini,istruzione}
2005	{coscritti,uomini,persone,bambini,istruzione}
2006	{coscritti,uomini,persone,bambini,toscana,istruzione}
4548	{persone,"servizi pubblici",mestieri,"lavori maschili"}
1641	{coscritti,uomini,persone,bambini,istruzione,"lavori femminili"}
3294	{coscritti,uomini,persone,bambini,istruzione,andalo}
2238	{coscritti,uomini,persone,feste,bambini,istruzione,andalo}
1918	{coscritti,uomini,persone}
2847	{coscritti,uomini,persone,bambini,istruzione,andalo}
2237	{coscritti,uomini,persone,bambini,istruzione,"giochi e sport"}
3004	{coscritti,uomini,persone,bambini,istruzione,andalo}
2007	{coscritti,uomini,persone,bambini,istruzione,"lavori femminili"}
2909	{coscritti,uomini,persone,bambini,istruzione,"giochi e sport"}
2843	{coscritti,uomini,persone,bambini,istruzione,"lavori femminili"}
2242	{coscritti,uomini,persone,bambini,istruzione,"lavori femminili"}
2241	{coscritti,uomini,persone,bambini,toscana,istruzione,"lavori femminili"}
3826	{coscritti,uomini,persone,bambini,istruzione,cavedago}
3291	{coscritti,uomini,persone,bambini,istruzione,andalo}
2756	{coscritti,uomini,persone,feste,bambini,istruzione,"lavori femminili"}
2844	{coscritti,uomini,persone,bambini,istruzione,"lavori femminili"}
2755	{coscritti,uomini,persone,bambini,toscana,istruzione,"lavori femminili"}
3090	{coscritti,uomini,persone,bambini,istruzione,"lavori femminili",andalo}
3085	{coscritti,uomini,persone,bambini,istruzione,"lavori femminili",andalo}
3290	{coscritti,uomini,persone,bambini,istruzione,"lavori femminili",andalo}
2869	{coscritti,uomini,persone,bambini,toscana,istruzione}
3328	{coscritti,uomini,persone,bambini,istruzione,turismo}
4603	{coscritti,uomini,persone,spormaggiore,bambini,istruzione}
4172	{coscritti,uomini,persone,bambini,istruzione,montagne}
4299	{coscritti,uomini,persone,bambini,istruzione}
3091	{strumenti,coscritti,uomini,persone,bambini,istruzione}
4374	{coscritti,uomini,persone,feste,bambini,istruzione}
226	{coscritti,uomini,persone,feste,bambini,istruzione,viabilità}
1047	{coscritti,uomini,persone,mezzolombardo,bambini,"mezzi di trasporto",istruzione,viabilità}
1997	{coscritti,uomini,persone,bambini,toscana,"mezzi di trasporto",istruzione,viabilità,andalo}
3339	{coscritti,uomini,persone,mezzolombardo,bambini,"mezzi di trasporto",istruzione,viabilità}
744	{animali,allevamento,coscritti,uomini,persone,bambini,istruzione,andalo}
2239	{animali,allevamento,coscritti,uomini,persone,bambini,"mezzi di trasporto",istruzione,"lavori femminili",viabilità}
2092	{edifici,"edifici religiosi",coscritti,uomini,persone,bambini,istruzione}
1678	{coscritti,uomini,persone,bambini,istruzione}
1679	{coscritti,uomini,persone,bambini,istruzione}
2039	{coscritti,uomini,persone,bambini,istruzione,"lavori femminili"}
2009	{animali,allevamento,coscritti,uomini,persone,bambini,"mezzi di trasporto",istruzione,"lavori femminili",viabilità}
1755	{coscritti,uomini,persone,bambini,donne,istruzione}
1423	{coscritti,uomini,persone,feste,donne}
4574	{coscritti,uomini,persone,feste,donne}
1277	{coscritti,uomini,persone,feste,donne}
1254	{coscritti,uomini,persone,feste,donne}
4455	{coscritti,uomini,persone,feste,bambini,donne,istruzione}
225	{coscritti,uomini,persone,feste,bambini,donne,istruzione}
4205	{coscritti,uomini,persone,feste,bambini,donne,istruzione}
3435	{coscritti,uomini,persone}
3184	{coscritti,uomini,persone,bambini,istruzione,turismo}
1381	{coscritti,uomini,persone,bambini,istruzione}
3496	{coscritti,uomini,persone,bambini,istruzione}
617	{coscritti,uomini,persone,bambini,istruzione}
3183	{coscritti,uomini,persone,bambini,istruzione,turismo}
2140	{coscritti,uomini,persone,feste,bambini,istruzione}
2139	{coscritti,uomini,persone,feste,bambini,istruzione}
2163	{coscritti,uomini,persone,feste,bambini,istruzione}
2165	{coscritti,uomini,persone,feste,bambini,istruzione}
2164	{coscritti,uomini,persone,feste,bambini,istruzione}
2135	{coscritti,uomini,persone,feste,bambini,istruzione}
1097	{edifici,alberghi}
2174	{coscritti,uomini,persone,feste,bambini,istruzione}
2170	{coscritti,uomini,persone,feste,bambini,istruzione}
2137	{edifici,"edifici religiosi",coscritti,uomini,persone,bambini,istruzione}
2138	{edifici,"edifici religiosi",coscritti,uomini,persone,bambini,istruzione}
2644	{carnevale,feste,bambini}
1171	{carnevale,feste,turismo,molveno}
229	{edifici,persone,abbigliamento,emigrazione,mestieri,"lavori femminili",canton,agricoltura,viabilità}
662	{edifici,persone,uomini,abbigliamento,bambini,donne}
1303	{abbigliamento,"lavori femminili"}
1809	{edifici,"edifici religiosi"}
3471	{edifici,"edifici religiosi",turismo}
1854	{edifici,"edifici religiosi",montagne}
2712	{edifici,"edifici religiosi",persone,cavedago}
3271	{edifici,strumenti,"edifici religiosi"}
3739	{edifici,"edifici religiosi",cavedago}
4008	{"giochi e sport",edifici,"edifici religiosi",persone,viabilità}
4007	{"giochi e sport",edifici,"edifici religiosi",persone,viabilità}
1009	{edifici,"edifici religiosi",persone,"servizi pubblici","caccia e pesca",cavedago}
1970	{edifici,"edifici religiosi",persone,"caccia e pesca"}
3695	{edifici,"edifici religiosi","funzioni religiose",viabilità,montagne}
2257	{edifici,"edifici religiosi"}
2491	{persone,religiosi,andalo}
3200	{persone,riva,cavedago,religiosi}
2679	{"funzioni religiose",persone,religiosi}
2116	{edifici,"funzioni religiose",alberghi,feste,toscana}
492	{persone,sanità}
1979	{paganella,persone,fai,sanità}
2749	{paganella,persone,fai,sanità}
3785	{montagne,edifici,persone,sanità,cortalta}
1610	{edifici,persone,haidinger,sanità,istruzione,vienna,austriaco,montagne}
757	{edifici,"edifici religiosi","funzioni religiose"}
4559	{edifici,"edifici religiosi",spormaggiore,trento}
958	{edifici,"edifici religiosi",alberghi,"servizi pubblici",andalo,montagne}
838	{persone,uomini,abbigliamento}
2792	{persone,emigrazione}
1781	{persone,emigrazione}
3537	{persone,spormaggiore,emigrazione,"caccia e pesca",andalo}
4526	{spormaggiore,persone,emigrazione}
4525	{persone,spormaggiore,emigrazione}
3353	{persone,emigrazione,cavedago}
2316	{persone,emigrazione,cavedago}
2616	{persone,emigrazione}
4188	{persone,emigrazione}
2791	{persone,emigrazione,agricoltura,cavedago,montagne}
4199	{persone,emigrazione}
4213	{persone,emigrazione}
2600	{edifici,alberghi,persone,emigrazione,cavedago}
2751	{persone,bregenz,austria,emigrazione,voralberg,kennelbach}
1614	{persone,emigrazione}
2770	{persone,emigrazione,cavedago}
3736	{persone,emigrazione,cavedago}
1589	{persone,emigrazione}
3731	{persone,stoccarda,emigrazione,cavedago}
3536	{edifici,persone,emigrazione,cavedago}
2312	{persone,emigrazione,istruzione,cavedago}
3535	{edifici,persone,emigrazione,cavedago}
3542	{persone,emigrazione,"lavori femminili",cavedago}
4184	{persone,emigrazione}
1586	{persone,emigrazione,cavedago}
3540	{persone,uomini,spormaggiore,emigrazione,mestieri,"lavori maschili",andalo}
2614	{persone,emigrazione}
4187	{persone,emigrazione}
416	{persone,emigrazione}
2765	{persone,emigrazione}
3900	{strumenti,persone,agricoltura,paganella,montagne}
3430	{strumenti,agricoltura,paganella}
2343	{strumenti,agricoltura}
2345	{montagne,edifici,strumenti,alberghi,persone,boschi,agricoltura,viabilità}
2790	{edifici,persone,mestieri,"lavori maschili",cavedago}
1117	{edifici,"lavori maschili","giochi e sport"}
2325	{edifici,"lavori maschili",andalo}
884	{edifici,"lavori maschili","giochi e sport"}
1282	{abbigliamento,"lavori femminili"}
3038	{edifici,persone,"lavori femminili","lavori maschili",montagne}
2570	{edifici,fontane,"servizi pubblici"}
1301	{abbigliamento,"lavori femminili"}
1300	{abbigliamento,"lavori femminili"}
2258	{edifici,persone,alimentazione,"servizi pubblici",boschi,agricoltura,viabilità}
1574	{persone,donne,boschi,"lavori femminili",montagne}
4127	{edifici,fontane}
3185	{edifici,fontane,persone}
3093	{edifici,fontane,persone}
2568	{edifici,fontane,"servizi pubblici"}
1583	{edifici,fontane}
3687	{edifici,fontane}
3127	{edifici,fontane}
282	{edifici,fontane}
1500	{edifici,fontane,"lavori femminili",turismo}
286	{edifici,fontane,persone,cavedago}
287	{edifici,fontane}
4353	{edifici,fontane}
648	{edifici,fontane,turismo,viabilità,montagne}
3448	{edifici,fontane,persone}
2562	{edifici,fontane,"servizi pubblici",molveno,montagne}
2579	{edifici,fontane,turismo,viabilità,montagne}
3677	{edifici,fontane,persone,cavedago}
1906	{edifici,fontane,persone,turismo}
4393	{edifici,"edifici religiosi",fontane,persone,spormaggiore}
362	{edifici,fontane}
1554	{edifici,fontane}
4269	{edifici,fontane}
2927	{strumenti,agricoltura}
3415	{strumenti,abbigliamento,"lavori femminili",agricoltura}
223	{"funzioni religiose",persone,religiosi}
1608	{edifici,persone,mezzolombardo,istruzione,religiosi}
2761	{persone,cavedago,religiosi}
4321	{edifici,"edifici religiosi",persone,cavalese,religiosi}
374	{belfort,edifici,alimentazione,agricoltura,agricoltura}
1935	{"funzioni religiose",persone}
4587	{"funzioni religiose",persone}
423	{"funzioni religiose",persone}
4586	{"funzioni religiose",persone}
1934	{"funzioni religiose",persone}
1936	{"funzioni religiose",persone}
2173	{"funzioni religiose",persone}
1926	{edifici,"funzioni religiose",persone}
2169	{"funzioni religiose",persone}
526	{"funzioni religiose",persone}
1925	{edifici,"funzioni religiose","edifici religiosi",persone}
1928	{edifici,"funzioni religiose","edifici religiosi",persone,feste}
4275	{edifici,"funzioni religiose","edifici religiosi",persone}
365	{edifici,alberghi,"servizi pubblici",turismo,montagne}
1305	{abbigliamento,"lavori femminili"}
323	{edifici,coscritti,alberghi,uomini,persone,bambini,"servizi pubblici","mezzi di trasporto",istruzione,viabilità,andalo,montagne}
1275	{istruzione,"giochi e sport"}
1370	{persone,"giochi e sport"}
1172	{persone,bambini,turismo,molveno,"giochi e sport",montagne}
3121	{persone,"giochi e sport"}
1773	{edifici,persone,fontane,bambini,"giochi e sport"}
3337	{edifici,alberghi,alimentazione,agricoltura,boschi,agricoltura,viabilità,cavedago,montagne,"giochi e sport"}
1919	{persone,spormaggiore,boschi,mestieri}
2777	{persone,boschi,mestieri,cavedago}
3769	{persone,boschi,mestieri}
4246	{persone,feste,bambini,boschi,mestieri}
3775	{animali,persone,fai,boschi,mestieri,"caccia e pesca",paganella}
2374	{persone,boschi,mestieri,cavedago}
778	{edifici,alberghi,montagne}
701	{edifici,alberghi}
1017	{edifici,alberghi}
1113	{edifici,alberghi,molveno}
782	{edifici,alberghi}
1108	{edifici,alberghi,molveno}
681	{edifici,alberghi,"servizi pubblici"}
963	{edifici,alberghi,"servizi pubblici"}
729	{paganella,montagne,edifici,alberghi,"servizi pubblici"}
1103	{edifici,alberghi,valle,molveno}
1105	{edifici,alberghi,valle,molveno}
1404	{edifici,alberghi,agricoltura,molveno}
1098	{edifici,alberghi,persone,emigrazione,turismo}
1750	{edifici,alberghi,"servizi pubblici",montagne}
1106	{edifici,alberghi,molveno,montagne}
997	{edifici,alberghi,"servizi pubblici"}
1391	{edifici,alberghi,persone,"mezzi di trasporto",montagne}
1670	{edifici,alberghi,persone,toscana,montagne}
2125	{edifici,alberghi,persone,viabilità}
3532	{edifici,alberghi,persone,turismo}
3531	{edifici,alberghi,persone,turismo}
2045	{edifici,alberghi,persone,"servizi pubblici",cavedago}
4109	{edifici,alberghi,persone,"servizi pubblici",cavedago}
4107	{edifici,alberghi,spormaggiore,persone,"servizi pubblici",cavedago}
704	{edifici,alberghi,feste,"mezzi di trasporto",montagne}
1829	{edifici,alberghi,boschi,montagne}
2573	{edifici,"edifici religiosi",alberghi,montagne}
600	{edifici,"edifici religiosi",alberghi,feste,viabilità}
2604	{edifici,"edifici religiosi",alberghi,riva,turismo,molveno,montagne}
728	{andalo,montagne,edifici,"edifici religiosi",alberghi,feste}
891	{edifici,alberghi,persone,mestieri,agricoltura}
3047	{edifici,alberghi,persone,"lavori maschili"}
1392	{strumenti,viabilità,"lavori maschili",molveno,montagne}
2676	{persone,riva,istruzione,cavedago}
3217	{persone,riva,istruzione,cavedago}
3706	{lavarone,persone,istruzione,cavedago}
3767	{"mezzi di trasporto",viabilità,"lavori maschili"}
3771	{"mezzi di trasporto",viabilità}
217	{"servizi pubblici","mezzi di trasporto",viabilità}
220	{"mezzi di trasporto",viabilità,cavedago}
4226	{"mezzi di trasporto",donne,turismo,viabilità}
2569	{edifici,alberghi,fontane,"servizi pubblici","giochi e sport"}
284	{edifici,donne,"lavori femminili",cavedago,montagne}
3681	{edifici,donne,"lavori femminili",cavedago,montagne}
3611	{edifici,strumenti,abbigliamento,"mezzi di trasporto",boschi,"lavori femminili",agricoltura,viabilità,cavedago,montagne}
2505	{strumenti,persone,agricoltura}
3472	{edifici,alberghi,"servizi pubblici",turismo,cavedago}
2636	{edifici,alberghi,viabilità}
2112	{"mezzi di trasporto",viabilità}
1763	{"servizi pubblici","mezzi di trasporto",viabilità}
2576	{"mezzi di trasporto",viabilità,montagne}
1984	{"mezzi di trasporto",cavedago,viabilità}
2408	{persone,"mezzi di trasporto",viabilità}
4006	{persone,"mezzi di trasporto",donne,viabilità,cavedago}
4515	{strumenti,"mezzi di trasporto",viabilità,"lavori maschili"}
2692	{persone,alimentazione,agricoltura,"mezzi di trasporto",emigrazione,agricoltura,viabilità}
523	{edifici,"edifici religiosi"}
235	{edifici,"edifici religiosi"}
150	{edifici,uomini,militari,bambini}
2334	{edifici,"edifici religiosi",istruzione,montagne}
2862	{edifici,"edifici religiosi","funzioni religiose",cavedago}
4263	{edifici,"edifici religiosi","funzioni religiose"}
3381	{andalo,montagne,edifici,"edifici religiosi","funzioni religiose",palù}
4215	{edifici,"edifici religiosi","funzioni religiose"}
4262	{edifici,"edifici religiosi","funzioni religiose"}
4378	{edifici,"edifici religiosi","funzioni religiose"}
4265	{edifici,"edifici religiosi","funzioni religiose",spormaggiore,boschi}
4550	{edifici,"edifici religiosi","funzioni religiose",spormaggiore,persone}
4482	{edifici,"edifici religiosi","funzioni religiose",spormaggiore}
2175	{edifici,"edifici religiosi","funzioni religiose",persone,bambini,istruzione}
2172	{edifici,"edifici religiosi","funzioni religiose",persone,bambini,istruzione}
2133	{edifici,"edifici religiosi","funzioni religiose",persone,feste,bambini,istruzione}
4331	{edifici,"edifici religiosi","funzioni religiose",persone,bambini,istruzione}
3570	{montagne,edifici,"edifici religiosi","funzioni religiose",persone,bambini,istruzione,cavedago}
4330	{edifici,"edifici religiosi","funzioni religiose",persone,bambini,istruzione}
163	{edifici,"edifici religiosi","funzioni religiose",coscritti,uomini,persone,boschi,viabilità}
2736	{edifici,"edifici religiosi","funzioni religiose",coscritti,uomini,persone,feste,cavedago}
2886	{edifici,"edifici religiosi","funzioni religiose",coscritti,uomini,persone,bambini,istruzione,andalo}
4286	{edifici,"edifici religiosi","funzioni religiose",coscritti,uomini,persone,bambini,istruzione}
4385	{edifici,"edifici religiosi","funzioni religiose",coscritti,uomini,persone,feste,bambini,istruzione}
1756	{edifici,"edifici religiosi",coscritti,uomini,persone}
224	{edifici,"edifici religiosi",coscritti,uomini,persone,bambini,istruzione}
2101	{edifici,"edifici religiosi",coscritti,uomini,persone,feste,bambini,istruzione,andalo}
1830	{edifici,"edifici religiosi","funzioni religiose"}
3675	{edifici,"edifici religiosi","funzioni religiose",allevamento,persone,"servizi pubblici",montagne}
259	{uomini,persone,militari}
3559	{edifici,"edifici religiosi","funzioni religiose",persone,abbigliamento,bambini,istruzione,cavedago}
2020	{persone,istruzione}
2904	{persone,bambini,istruzione}
2366	{persone,bambini,istruzione,cavedago}
1053	{persone,fai,feste,bambini,istruzione,priori,boschi,cavedago,paganella}
1647	{persone,istruzione,cavedago}
2958	{"funzioni religiose",persone,istruzione}
3265	{persone,istruzione,paganella}
2939	{persone,feste,istruzione,priori,boschi}
1933	{edifici,persone,istruzione}
3975	{"funzioni religiose",persone,"servizi pubblici",istruzione,cavedago}
4531	{edifici,persone,spormaggiore,feste,istruzione}
3264	{persone,istruzione,paganella}
266	{persone,feste,istruzione}
346	{persone,spormaggiore,bambini,istruzione}
1759	{edifici,persone,bambini,istruzione}
2335	{persone,istruzione,turismo}
3905	{edifici,"edifici religiosi",persone,istruzione,viabilità}
515	{edifici,persone,bambini,istruzione}
1284	{persone,bambini,istruzione}
2959	{"funzioni religiose",persone,bambini,istruzione}
647	{"funzioni religiose",coscritti,uomini,persone,istruzione}
4508	{persone,istruzione}
4537	{edifici,persone,feste,"mezzi di trasporto",istruzione,viabilità}
2337	{persone,drena,istruzione,turismo}
1914	{persone,feste,istruzione,boschi}
3477	{persone,istruzione,paganella}
1259	{persone,istruzione}
1785	{persone,istruzione}
719	{persone,istruzione}
4011	{persone,bambini,istruzione}
253	{persone,istruzione,"lavori femminili"}
460	{persone,istruzione}
468	{persone,istruzione}
435	{persone,"servizi pubblici",istruzione}
458	{persone,istruzione}
510	{persone,feste,istruzione,boschi}
1257	{persone,bambini,istruzione}
1285	{persone,istruzione}
2477	{persone,fai,emigrazione,istruzione,cavedago,paganella}
3930	{persone,istruzione,cavedago}
3931	{persone,istruzione}
4014	{spormaggiore,persone,istruzione}
2747	{"funzioni religiose",persone,istruzione,"lavori femminili"}
3671	{persone,bambini,istruzione,cavedago,montagne}
4386	{persone,"servizi pubblici",istruzione,cavedago,montagne}
2936	{persone,feste,istruzione,priori,boschi,cavedago,montagne}
4025	{persone,istruzione,cavedago}
3557	{persone,feste,bambini,istruzione,priori,boschi}
4512	{persone,spormaggiore,istruzione}
4026	{persone,istruzione,cavedago}
2960	{edifici,"edifici religiosi","funzioni religiose",persone,istruzione}
4309	{persone,abbigliamento,istruzione}
4340	{edifici,"edifici religiosi",persone,spormaggiore,istruzione}
1754	{persone,feste,bambini,istruzione}
1650	{"funzioni religiose",persone,istruzione,religiosi}
2664	{edifici,"edifici religiosi",persone,istruzione}
340	{persone,drena,istruzione,sanità}
332	{"giochi e sport",edifici,"edifici religiosi",spormaggiore,persone,feste,sanità,istruzione,religiosi}
1803	{"funzioni religiose",persone,istruzione}
2375	{persone,istruzione,boschi,mestieri,"lavori femminili",cavedago,montagne}
2360	{edifici,persone,istruzione,boschi,mestieri,cavedago}
2207	{spormaggiore,persone,feste,istruzione,priori,boschi,"lavori femminili"}
4012	{persone,bambini,istruzione}
3690	{persone,feste,bambini,istruzione,priori,boschi,cavedago,montagne}
3693	{persone,feste,istruzione,boschi,cavedago}
4381	{edifici,"edifici religiosi",persone,bambini,istruzione,"giochi e sport"}
2938	{persone,feste,bambini,istruzione,priori,boschi,mestieri,cavedago,montagne}
1302	{abbigliamento,"lavori femminili"}
1311	{abbigliamento,"lavori femminili"}
1309	{abbigliamento,"lavori femminili"}
1308	{abbigliamento,"lavori femminili"}
1304	{abbigliamento,"lavori femminili"}
1307	{abbigliamento,"lavori femminili"}
1306	{abbigliamento,"lavori femminili"}
280	{edifici,animali,allevamento,persone,boschi,canton}
281	{edifici,animali,allevamento,persone,alimentazione,agricoltura,donne,canton,agricoltura}
1646	{edifici,"edifici religiosi",animali,allevamento,persone,feste,"servizi pubblici"}
2046	{edifici,"edifici religiosi",animali,allevamento,persone,feste,"servizi pubblici"}
3740	{edifici,"edifici religiosi",animali,allevamento,persone,feste,"servizi pubblici"}
2146	{allevamento,allevamento}
4421	{allevamento,allevamento}
4420	{allevamento,allevamento}
493	{allevamento,allevamento}
2848	{allevamento,allevamento}
4552	{allevamento,allevamento}
4596	{allevamento,allevamento}
1705	{allevamento,allevamento,montagne}
4467	{allevamento,allevamento}
4372	{allevamento,allevamento}
4171	{allevamento,persone,allevamento}
1706	{allevamento,allevamento}
3233	{allevamento,persone,allevamento}
4501	{allevamento,boschi,allevamento}
564	{edifici,allevamento,persone,donne,allevamento,cavedago}
801	{allevamento,allevamento,cavedago}
853	{allevamento,allevamento,zambana,turismo,montagne}
883	{allevamento,allevamento,zambana,turismo,montagne}
1707	{allevamento,persone,allevamento}
1709	{allevamento,persone,bambini,allevamento}
1577	{edifici,allevamento,allevamento,turismo}
1295	{allevamento,allevamento,agricoltura,molveno,montagne}
4432	{allevamento,persone,boschi,allevamento}
1946	{animali,allevamento,persone,allevamento}
3390	{allevamento,allevamento,"caccia e pesca"}
3391	{allevamento,allevamento,"caccia e pesca"}
1173	{montagne,edifici,allevamento,alberghi,allevamento,molveno}
3403	{persone,mestieri,"lavori maschili",cavedago}
2109	{edifici,rifugi}
2206	{allevamento,persone,carnevale,feste,bambini,istruzione,allevamento,mestieri,cavedago}
1538	{edifici,montagne}
1362	{edifici,cavedago,montagne}
1366	{edifici,persone,donne,montagne}
1357	{edifici,persone,cavedago,montagne}
1545	{edifici,persone,montagne}
1350	{edifici,persone,"mezzi di trasporto",montagne}
1544	{edifici,persone,montagne}
1351	{edifici,persone,montagne}
1547	{edifici,persone,montagne}
1542	{edifici,persone,montagne}
1548	{edifici,persone,montagne,"giochi e sport"}
1354	{edifici,animali,persone,abbigliamento,feste,"caccia e pesca",montagne}
1365	{edifici,animali,persone,donne,"caccia e pesca",montagne}
2678	{edifici,persone,stoccarda,emigrazione,montagne}
2717	{edifici,cavedago,montagne}
3980	{edifici,persone,montagne}
2414	{andalo,montagne,edifici}
688	{edifici,persone,andalo,montagne}
686	{edifici,persone,montagne}
736	{edifici,persone,andalo,montagne}
2218	{edifici,persone,bambini,istruzione,montagne}
1071	{edifici,"edifici religiosi","servizi pubblici",istruzione,montagne}
845	{edifici,donne,turismo,agricoltura,viabilità,molveno,andalo,montagne}
543	{andalo,montagne,edifici,"edifici religiosi",alberghi,toscana,turismo}
1092	{andalo,montagne,edifici,"edifici religiosi",alberghi,toscana,turismo}
2519	{andalo,montagne,edifici,"edifici religiosi",alberghi,toscana,turismo}
2932	{edifici,boschi,montagne}
3027	{edifici,montagne}
3409	{edifici,montagne}
1508	{edifici,montagne}
2994	{edifici,montagne}
2998	{edifici,montagne}
2035	{edifici,montagne}
994	{edifici,montagne}
2195	{edifici,canton,montagne}
2793	{edifici,montagne}
2193	{edifici,canton,montagne}
2934	{edifici,montagne}
2962	{edifici,donne,montagne}
3602	{edifici,"servizi pubblici",montagne}
392	{edifici,persone,montagne}
890	{edifici,toscana,montagne}
3031	{edifici,montagne}
888	{edifici,montagne}
846	{edifici,agricoltura,montagne}
339	{edifici,montagne}
1076	{edifici,montagne}
657	{edifici,montagne}
2935	{edifici,persone,montagne}
1079	{edifici,montagne}
275	{edifici,turismo,montagne}
542	{edifici,toscana,turismo,montagne}
1956	{edifici,toscana,montagne}
319	{edifici,bambini,"lavori femminili",turismo,montagne}
4013	{edifici,bambini,canton,montagne}
874	{edifici,toscana,turismo,montagne}
1040	{edifici,montagne}
2326	{edifici,persone,viabilità,montagne}
3666	{montagne,edifici,persone}
741	{edifici,persone,andalo,montagne}
832	{edifici,turismo,andalo,montagne}
950	{edifici,turismo,viabilità,montagne}
2054	{edifici,montagne}
790	{edifici,toscana,montagne}
785	{edifici,turismo,andalo,montagne}
732	{edifici,cassiano,"lavori femminili",andalo,montagne}
614	{edifici,toscana,montagne}
1073	{edifici,"funzioni religiose",montagne}
713	{edifici,casanova,toscana,montagne}
4449	{uomini,persone,militari}
1070	{edifici,montagne}
1016	{edifici,casanova,toscana,viabilità,montagne}
951	{edifici,montagne}
957	{edifici,casanova,toscana,viabilità,montagne}
1046	{edifici,tenno,boschi,viabilità,cavedago,molveno,"giochi e sport",montagne}
1894	{edifici,toscana,turismo,montagne}
2968	{edifici,toscana,montagne}
1624	{edifici,persone,montagne}
1865	{edifici,montagne}
2504	{edifici,boschi,montagne}
1746	{edifici,istruzione,andalo,montagne}
2386	{edifici,"mezzi di trasporto",montagne}
2197	{edifici,canton,cavedago,montagne}
1857	{edifici,cassiano,"lavori femminili",andalo,montagne}
2986	{edifici,montagne}
1889	{edifici,montagne}
2977	{edifici,montagne}
1858	{edifici,toscana,boschi,turismo,montagne}
2984	{edifici,montagne}
1969	{edifici,toscana,boschi,montagne}
2668	{edifici,toscana,boschi,turismo,montagne}
2052	{montagne,edifici,boschi,viabilità,cavedago}
2497	{edifici,alimentazione,toscana,montagne}
2494	{edifici,alimentazione,toscana,montagne}
2196	{edifici,canton,viabilità,montagne}
3601	{edifici,persone,montagne,"giochi e sport"}
2464	{edifici,casanova,persone,montagne}
2403	{montagne,belfort,edifici,spormaggiore,valle}
2759	{edifici,canton,cavedago,viabilità,montagne}
2498	{edifici,alimentazione,toscana,montagne}
2482	{edifici,persone,canton,cavedago,montagne}
2963	{edifici,persone,montagne}
2980	{edifici,montagne}
3032	{edifici,persone,montagne}
4145	{edifici,montagne}
2966	{edifici,toscana,montagne}
2978	{edifici,montagne}
2972	{edifici,viabilità,montagne}
3814	{edifici,cavedago,montagne}
3722	{edifici,canton,montagne}
3589	{edifici,feste,istruzione,boschi,"lavori femminili",andalo,montagne}
3810	{edifici,persone,"servizi pubblici",cavedago,montagne}
3813	{edifici,"servizi pubblici",montagne}
2495	{edifici,animali,allevamento,alimentazione,toscana,montagne}
2493	{edifici,animali,allevamento,alimentazione,toscana,montagne}
3721	{edifici,animali,allevamento,persone,toscana,bambini,boschi,agricoltura,viabilità,andalo,montagne}
2209	{montagne,edifici,strumenti,allevamento,cavedago}
685	{edifici,alberghi,persone,andalo,montagne}
991	{edifici,andalo,montagne,"giochi e sport"}
1983	{edifici,"edifici religiosi",cavedago,montagne}
3805	{edifici,"edifici religiosi",cavedago,montagne}
2641	{edifici,alimentazione,boschi,agricoltura,viabilità,montagne}
4489	{uomini,persone,militari}
2127	{edifici,"edifici religiosi",riva,andalo,montagne}
3821	{edifici,"edifici religiosi",canton,agricoltura,cavedago,montagne}
3850	{edifici,"edifici religiosi",canton,viabilità,montagne}
4154	{edifici,"edifici religiosi",alberghi,istruzione,cavedago,viabilità,montagne,"giochi e sport"}
2344	{edifici,strumenti,persone,agricoltura,montagne}
3655	{montagne,edifici,"edifici religiosi",viabilità}
1505	{montagne,edifici,alberghi,viabilità}
231	{montagne,"giochi e sport",edifici,persone,"mezzi di trasporto",mestieri,canton,agricoltura,viabilità}
2748	{edifici,coscritti,uomini,persone,feste,bambini,"servizi pubblici",istruzione,canton,cavedago,montagne}
2804	{montagne,edifici,strumenti,"edifici religiosi","servizi pubblici","lavori femminili",viabilità,molveno}
3820	{edifici,"edifici religiosi",agricoltura,cavedago,montagne}
1749	{andalo,montagne,edifici,"edifici religiosi",alberghi,istruzione,cavedago}
2315	{edifici,persone,bambini,emigrazione,istruzione,cavedago,montagne}
2784	{montagne,"giochi e sport",edifici,persone,emigrazione,cavedago,viabilità}
2487	{montagne,edifici,persone,emigrazione,canton,cavedago}
2346	{edifici,strumenti,persone,agricoltura,montagne}
1018	{edifici,trento,"lavori maschili",montagne,"giochi e sport"}
3400	{edifici,persone,alimentazione,bambini,istruzione,agricoltura,viabilità,montagne}
1121	{edifici,fontane,turismo,montagne}
3685	{edifici,fontane,montagne,"giochi e sport"}
2451	{edifici,persone,alimentazione,agricoltura,agricoltura,montagne}
2385	{edifici,persone,alimentazione,agricoltura,agricoltura,montagne}
2993	{andalo,montagne,paganella,edifici,"edifici religiosi",persone,alimentazione,agricoltura,agricoltura}
730	{edifici,alberghi,"servizi pubblici",montagne}
734	{edifici,alberghi,"servizi pubblici",montagne}
687	{edifici,alberghi,persone,toscana,"servizi pubblici",andalo,montagne}
1237	{uomini,persone,militari}
2661	{edifici,"edifici religiosi",alberghi,feste,"servizi pubblici",turismo,andalo,montagne,paganella}
1960	{andalo,paganella,"giochi e sport",montagne,edifici,"edifici religiosi",alberghi,istruzione}
892	{edifici,alberghi,toscana,"lavori maschili",montagne}
322	{uomini,militari}
1955	{edifici,alberghi,montagne}
2992	{edifici,"edifici religiosi",alberghi,persone,alimentazione,agricoltura,"servizi pubblici",agricoltura,andalo,montagne}
1119	{edifici,"edifici religiosi",alberghi,istruzione,turismo,"lavori maschili",andalo,montagne}
2719	{edifici,animali,allevamento,persone,bambini,montagne}
885	{edifici,"edifici religiosi",alberghi,istruzione,turismo,"lavori maschili",andalo,montagne}
2051	{montagne,edifici,"edifici religiosi","funzioni religiose",coscritti,uomini,persone,boschi}
2864	{montagne,edifici,"edifici religiosi","funzioni religiose",coscritti,uomini,persone,boschi}
2763	{edifici,"funzioni religiose",persone,feste,istruzione,canton,montagne}
601	{edifici,"edifici religiosi",animali,alberghi,persone,toscana,istruzione,"caccia e pesca",turismo,viabilità,andalo,montagne}
854	{edifici,"edifici religiosi",animali,alberghi,persone,toscana,istruzione,"caccia e pesca",viabilità,andalo,montagne}
2597	{edifici,"edifici religiosi",animali,alberghi,persone,toscana,istruzione,"caccia e pesca",turismo,viabilità,andalo,montagne}
1144	{edifici,persone,alberghi,istruzione,andalo,montagne}
2991	{edifici,"edifici religiosi",persone,alberghi,toscana,"servizi pubblici",istruzione,andalo,paganella,montagne}
245	{edifici,strumenti,animali,allevamento,persone,boschi,mestieri,"lavori maschili",montagne}
3399	{edifici,boschi,agricoltura,viabilità,cavedago,montagne,"giochi e sport"}
2700	{edifici,persone,montagne}
2693	{edifici,persone,cavedago,montagne}
2688	{edifici,persone,cavedago,montagne}
2702	{edifici,persone,montagne}
2686	{edifici,"edifici religiosi",persone,bambini,cavedago,montagne,"giochi e sport"}
1990	{edifici,"edifici religiosi",bedolè,agricoltura,montagne}
3694	{edifici,fontane,viabilità,montagne}
598	{edifici,"edifici religiosi",turismo,andalo,montagne,"giochi e sport"}
3599	{edifici,"edifici religiosi",persone,"servizi pubblici",boschi,"giochi e sport",montagne}
541	{edifici,"servizi pubblici",turismo,"lavori maschili",andalo,montagne}
2657	{edifici,"servizi pubblici",turismo,"lavori maschili",andalo,montagne}
2226	{uomini,persone,militari,montagne}
355	{edifici,"edifici religiosi",persone,"servizi pubblici",istruzione,turismo,"lavori maschili",andalo,montagne}
769	{edifici,"edifici religiosi",persone,"servizi pubblici",istruzione,turismo,"lavori maschili",andalo,montagne}
1123	{edifici,"edifici religiosi",persone,"servizi pubblici",istruzione,turismo,"lavori maschili",andalo,montagne}
2541	{edifici,"edifici religiosi",persone,"servizi pubblici",istruzione,turismo,"lavori maschili",andalo,montagne}
1893	{edifici,"edifici religiosi",persone,alberghi,"servizi pubblici",istruzione,andalo,montagne}
1713	{"funzioni religiose",persone}
3297	{"funzioni religiose",persone}
4411	{"funzioni religiose",persone}
4195	{"funzioni religiose",persone}
4571	{"funzioni religiose",persone}
4479	{"funzioni religiose",persone}
4223	{"funzioni religiose",persone}
270	{"funzioni religiose",persone}
3348	{"funzioni religiose",persone}
4618	{"funzioni religiose",persone}
3176	{"funzioni religiose",persone}
4306	{"funzioni religiose",persone,montagne}
1895	{"funzioni religiose",persone}
556	{"funzioni religiose",persone,uomini}
4155	{"funzioni religiose",persone,cavedago}
4446	{"funzioni religiose",persone}
438	{edifici,"funzioni religiose",persone}
3547	{"funzioni religiose",persone,feste}
4626	{"funzioni religiose",persone}
4459	{"funzioni religiose",persone}
466	{"funzioni religiose",persone,feste}
4460	{"funzioni religiose",persone}
4616	{"funzioni religiose",persone}
3919	{"funzioni religiose",persone}
2626	{"funzioni religiose",persone,cavedago}
1796	{"funzioni religiose",persone}
3899	{"funzioni religiose",persone}
3897	{"funzioni religiose",persone}
4285	{"funzioni religiose",persone}
3423	{"funzioni religiose",persone}
3920	{"funzioni religiose",persone}
3592	{edifici,"funzioni religiose",persone,donne,canton}
4528	{"funzioni religiose",persone}
4236	{"funzioni religiose",persone}
4242	{"funzioni religiose",persone}
811	{edifici,"funzioni religiose",persone,abbigliamento}
923	{edifici,persone,sanità,cavedago,"giochi e sport",paganella}
3720	{edifici,persone,sanità,agricoltura,turismo,cavedago,montagne,"giochi e sport"}
968	{edifici,persone,sanità,cavedago}
2320	{persone,sanità}
960	{edifici,persone,alberghi,sanità,andalo,paganella,montagne}
672	{edifici,persone,sanità,viabilità,montagne}
1147	{edifici,persone,sanità,turismo,montagne}
1891	{edifici,persone,sanità,turismo,montagne}
3855	{persone,agricoltura,alimentazione,bambini,donne,agricoltura,cavedago}
1959	{andalo,montagne,edifici,"edifici religiosi",persone,sanità}
1879	{edifici,"edifici religiosi",persone,alberghi,riva,sanità,istruzione,boschi,turismo,andalo,montagne}
2529	{edifici,"edifici religiosi",persone,alberghi,riva,sanità,istruzione,boschi,turismo,andalo,montagne}
3872	{"funzioni religiose",persone,uomini,agricoltura,alimentazione,agricoltura,cavedago}
278	{alimentazione,agricoltura,verdura}
3893	{persone,agricoltura,alimentazione,agricoltura}
3918	{persone,agricoltura,alimentazione,agricoltura}
3916	{spormaggiore,agricoltura,alimentazione,agricoltura}
3884	{"funzioni religiose",spormaggiore,agricoltura,alimentazione,agricoltura}
3874	{"funzioni religiose",agricoltura,alimentazione,agricoltura}
3868	{persone,agricoltura,alimentazione,bambini,donne,agricoltura,cavedago}
3854	{persone,agricoltura,alimentazione,bambini,donne,agricoltura,cavedago}
3875	{"funzioni religiose",persone,agricoltura,alimentazione,agricoltura}
3883	{"funzioni religiose",persone,agricoltura,alimentazione,bambini,agricoltura,cavedago}
3895	{persone,agricoltura,alimentazione,agricoltura}
3882	{"funzioni religiose",persone,agricoltura,alimentazione,bambini,agricoltura,cavedago}
3551	{uomini,militari,turismo,montagne}
3545	{edifici,"mezzi di trasporto",viabilità}
246	{edifici,persone,"mezzi di trasporto",viabilità,cavedago}
247	{edifici,persone,"mezzi di trasporto",viabilità,cavedago}
3039	{edifici,"edifici religiosi","funzioni religiose",alberghi,toscana,boschi,montagne}
797	{edifici,"edifici religiosi",alberghi,persone,"servizi pubblici",istruzione,andalo,montagne}
1867	{edifici,"edifici religiosi",alberghi,persone,"servizi pubblici",istruzione,andalo,montagne,paganella}
1657	{uomini,militari}
1806	{uomini,militari}
3307	{uomini,militari}
1414	{uomini,militari}
3370	{uomini,militari}
2176	{uomini,militari}
3457	{uomini,militari}
2273	{uomini,militari}
3053	{edifici,uomini,militari}
1626	{uomini,militari,toscana}
2341	{uomini,militari,piacenza}
3295	{uomini,militari,bambini}
4447	{uomini,militari}
3374	{uomini,persone,militari}
2859	{uomini,militari}
3446	{uomini,militari,vienna}
2024	{uomini,militari}
3383	{uomini,militari}
1639	{uomini,militari,montagne}
2619	{uomini,militari,feste,cavedago}
4327	{uomini,militari}
2342	{uomini,militari}
4208	{uomini,militari}
3171	{uomini,militari}
1492	{uomini,militari}
2807	{uomini,militari,cavedago}
1636	{uomini,militari,montagne}
4276	{uomini,persone,militari}
3095	{uomini,militari}
2097	{uomini,militari}
2012	{uomini,militari}
4288	{uomini,persone,militari}
3445	{uomini,militari,vienna}
1424	{uomini,militari,"servizi pubblici"}
3380	{uomini,militari}
2011	{uomini,militari}
2460	{uomini,militari}
2461	{uomini,militari}
2271	{uomini,militari}
810	{uomini,militari}
727	{uomini,militari,emigrazione}
1656	{uomini,persone,militari}
1007	{uomini,persone,militari,turismo}
405	{uomini,militari}
2123	{uomini,militari,"servizi pubblici"}
799	{uomini,militari}
925	{uomini,militari,cavedago,viabilità}
316	{uomini,militari,montagne}
291	{edifici,uomini,militari,istruzione,cavedago}
3192	{uomini,militari,turismo}
292	{edifici,"funzioni religiose",uomini,persone,militari,feste,emigrazione,istruzione,cavedago}
2397	{uomini,persone,militari}
4397	{uomini,persone,militari,istruzione}
409	{uomini,militari}
1682	{uomini,persone,militari}
408	{edifici,uomini,militari}
1248	{uomini,militari}
1494	{uomini,militari,neustadt}
2044	{belfort,edifici,uomini,militari}
4328	{uomini,militari,agricoltura}
3321	{uomini,militari,"servizi pubblici",turismo}
809	{uomini,militari,adige,cavedago}
2456	{uomini,militari,renon}
3552	{uomini,militari,turismo,montagne}
1283	{uomini,persone,militari,feste,"servizi pubblici",cavedago}
1220	{uomini,spormaggiore,militari}
1478	{uomini,spormaggiore,militari}
2093	{uomini,militari,vienna}
865	{paganella,montagne,uomini,militari,trento,turismo}
1536	{uomini,militari,feste,"giochi e sport"}
1658	{uomini,persone,militari}
1566	{montagne,belfort,edifici,uomini,militari}
1921	{uomini,militari}
2280	{langen,uomini,bregenz,austria,militari,voralberg}
3568	{uomini,persone,militari}
1835	{edifici,uomini,militari,"servizi pubblici",turismo}
2061	{belfort,edifici,uomini,militari,boschi}
1862	{edifici,uomini,militari,"caccia e pesca"}
1782	{uomini,militari,cavedago}
4068	{uomini,persone,militari}
1999	{uomini,militari,toscana,andalo}
2378	{uomini,militari}
2281	{langen,uomini,austria,bregenz,militari,voralberg}
2309	{uomini,militari,emigrazione,cavedago}
2276	{langen,uomini,austria,bregenz,militari,voralberg}
2278	{langen,uomini,bregenz,austria,militari,voralberg}
2279	{langen,uomini,bregenz,austria,militari,voralberg}
4390	{uomini,militari,"servizi pubblici"}
4348	{uomini,persone,militari}
3678	{montagne,edifici,uomini,militari}
3817	{uomini,persone,militari,francia}
2820	{uomini,militari,cavedago}
2803	{uomini,militari,cavedago}
3281	{uomini,militari}
4020	{uomini,persone,militari,cavedago}
3701	{edifici,uomini,militari,cavedago,montagne}
3299	{"funzioni religiose",uomini,militari,bambini}
3703	{edifici,uomini,militari,cavedago,montagne}
3799	{edifici,uomini,persone,militari,paganella,montagne}
4387	{uomini,persone,militari,"servizi pubblici"}
3904	{uomini,militari,boschi}
4243	{edifici,uomini,persone,militari}
4024	{uomini,persone,militari,cavedago}
3748	{uomini,militari}
3205	{uomini,persone,militari}
2876	{uomini,militari,agricoltura}
3387	{uomini,militari,turismo}
3256	{uomini,militari,istruzione}
4062	{uomini,persone,militari,abbigliamento}
3150	{uomini,persone,militari,abbigliamento,vipiteno}
762	{uomini,persone,militari}
2013	{uomini,persone,militari}
760	{uomini,persone,militari}
761	{uomini,persone,militari}
747	{uomini,persone,militari}
394	{uomini,persone,militari}
919	{edifici,uomini,persone,militari,fai,feste,toscana,boschi,agricoltura,molveno,"giochi e sport",paganella}
2453	{uomini,persone,militari,feste,agricoltura,montagne}
2454	{uomini,persone,militari,feste,agricoltura,montagne}
2327	{uomini,persone,militari,feste,montagne}
2650	{uomini,persone,militari,feste}
2810	{uomini,persone,militari,cavedago}
4598	{montagne,belfort,edifici,uomini,persone,spormaggiore,militari,feste}
1163	{uomini,persone,militari,molveno}
1178	{uomini,persone,militari,molveno}
3791	{uomini,persone,militari,istruzione}
404	{montagne,animali,allevamento,uomini,militari}
412	{montagne,animali,allevamento,uomini,militari}
2954	{uomini,persone,militari,"servizi pubblici"}
718	{uomini,persone,militari}
763	{uomini,persone,militari,bambini}
3909	{uomini,persone,militari,bambini}
3753	{uomini,persone,militari,bambini,turismo,montagne}
3553	{uomini,persone,militari,trento,bambini,turismo,montagne}
1296	{edifici,uomini,alberghi,militari,turismo,molveno}
3124	{uomini,persone,fai,militari}
3125	{edifici,uomini,persone,militari,fai,abbigliamento,paganella}
2722	{edifici,"edifici religiosi",uomini,militari,montagne}
1082	{edifici,uomini,militari,"servizi pubblici",viabilità,montagne}
3377	{edifici,"edifici religiosi",uomini,militari,bambini}
580	{uomini,persone,militari,religiosi}
3263	{uomini,persone,militari,religiosi}
3262	{uomini,persone,militari,religiosi}
1578	{uomini,militari,feste,"mezzi di trasporto",viabilità}
2160	{uomini,persone,militari,bambini,"mezzi di trasporto",viabilità}
2330	{allevamento,uomini,persone,militari,allevamento,mestieri}
2270	{allevamento,uomini,persone,militari,allevamento,mestieri}
4493	{animali,allevamento,uomini,militari}
314	{animali,allevamento,uomini,militari}
313	{animali,allevamento,uomini,militari}
2455	{edifici,uomini,persone,militari,feste,"servizi pubblici",montagne}
3101	{edifici,"edifici religiosi","funzioni religiose",uomini,militari}
3298	{edifici,"edifici religiosi","funzioni religiose",uomini,militari,bambini}
326	{uomini,persone,militari}
3145	{edifici,"edifici religiosi",uomini,persone,militari,feste}
1778	{edifici,"edifici religiosi",uomini,persone,militari,feste,carnevale}
4570	{edifici,"edifici religiosi",uomini,militari}
630	{uomini,persone,militari,bambini,istruzione}
2100	{uomini,persone,militari,bambini,istruzione,andalo}
248	{"funzioni religiose",uomini,persone,militari,bambini,istruzione}
2348	{uomini,militari}
2286	{uomini,militari}
2283	{uomini,militari}
2268	{uomini,persone,militari}
387	{uomini,persone,militari}
388	{uomini,persone,militari}
395	{uomini,persone,militari}
2128	{uomini,persone,militari}
3344	{uomini,persone,militari,turismo}
3340	{uomini,persone,militari}
3123	{uomini,persone,militari}
415	{uomini,persone,militari}
402	{uomini,persone,militari}
1493	{uomini,persone,militari}
2272	{uomini,persone,militari}
2819	{uomini,persone,militari,cavedago}
315	{uomini,persone,militari,montagne}
748	{uomini,persone,militari}
2881	{uomini,persone,militari}
311	{uomini,persone,militari,montagne}
312	{uomini,persone,militari,montagne}
410	{uomini,persone,militari,feste,"giochi e sport"}
411	{uomini,persone,militari}
310	{uomini,persone,militari,montagne}
2866	{uomini,persone,militari,cavedago}
414	{edifici,"funzioni religiose",uomini,persone,militari}
389	{uomini,persone,militari}
403	{uomini,persone,militari,istruzione,viabilità,montagne}
413	{uomini,persone,militari}
1504	{persone,innsbruck,uomini,militari}
2816	{uomini,persone,militari,cavedago}
2355	{uomini,persone,innsbruck,militari}
1982	{uomini,persone,militari}
2002	{uomini,persone,militari}
2222	{uomini,persone,militari,boemia,benešov}
2223	{uomini,persone,militari,boemia,benešov}
2880	{uomini,persone,militari}
3325	{uomini,persone,militari,bambini,istruzione,turismo}
3347	{uomini,persone,militari,bambini,istruzione}
3647	{uomini,persone,militari,toscana,mestieri,agricoltura}
3640	{uomini,persone,militari,toscana,mestieri,agricoltura}
682	{edifici,"edifici religiosi",uomini,persone,militari,"servizi pubblici",andalo,montagne}
1693	{coscritti,uomini,persone,militari}
2266	{coscritti,uomini,persone,militari,bambini,istruzione,cavedago,andalo}
1348	{coscritti,uomini,persone,militari,bambini,istruzione,montagne}
563	{coscritti,uomini,persone,militari,feste,bambini,istruzione,cavedago}
561	{coscritti,uomini,persone,militari,bambini,istruzione,cavedago,andalo}
2088	{uomini,persone,militari}
825	{coscritti,uomini,persone,militari,bambini,istruzione,montagne}
843	{coscritti,uomini,persone,militari,bambini,istruzione,montagne}
837	{coscritti,uomini,persone,militari,bambini,istruzione,montagne}
1049	{coscritti,uomini,persone,militari,feste,bambini,istruzione,montagne}
1601	{coscritti,uomini,persone,militari,bambini,istruzione,"lavori femminili"}
1572	{coscritti,uomini,persone,militari,feste,bambini,istruzione}
1591	{coscritti,uomini,persone,militari,bambini,istruzione,"lavori femminili"}
2426	{coscritti,uomini,persone,militari,feste,bambini,istruzione,cavedago}
2480	{coscritti,uomini,persone,militari,bambini,istruzione,cavedago}
1724	{coscritti,uomini,persone,militari,feste,bambini,istruzione,montagne}
2167	{coscritti,uomini,persone,militari,bambini,istruzione,montagne}
2157	{coscritti,uomini,persone,militari,bambini,istruzione,montagne}
2199	{coscritti,uomini,persone,militari,feste,bambini,istruzione,montagne}
2825	{coscritti,uomini,persone,militari,feste,bambini,istruzione,cavedago}
2155	{coscritti,uomini,persone,militari,bambini,istruzione,montagne}
2476	{coscritti,uomini,persone,militari,bambini,istruzione,cavedago}
2323	{coscritti,uomini,persone,militari,feste,bambini,istruzione,molveno,andalo}
2490	{edifici,coscritti,uomini,persone,militari,feste,bambini,istruzione,cavedago}
3382	{coscritti,uomini,persone,militari,feste,bambini,istruzione}
2806	{coscritti,uomini,persone,militari,feste,bambini,istruzione,cavedago}
3354	{coscritti,uomini,persone,militari,feste,bambini,istruzione,montagne}
4573	{coscritti,uomini,persone,militari,bambini,istruzione}
2868	{coscritti,uomini,persone,militari,bambini,istruzione,montagne}
3558	{coscritti,uomini,persone,militari,feste,bambini,istruzione,andalo}
546	{coscritti,uomini,persone,militari,feste,bambini,"mezzi di trasporto",istruzione,viabilità}
2091	{coscritti,uomini,persone,militari,bambini,"mezzi di trasporto",istruzione,"lavori femminili",viabilità}
302	{edifici,"edifici religiosi",coscritti,uomini,persone,militari,mezzolombardo,bambini,istruzione,"lavori femminili"}
2171	{coscritti,uomini,persone,militari,feste,bambini,istruzione}
2151	{coscritti,uomini,persone,militari,feste,bambini,istruzione,montagne}
2036	{valsabbia,edifici,"edifici religiosi",giudicarie,uomini,persone,militari,"servizi pubblici"}
1148	{edifici,uomini,militari,riva,turismo,"lavori maschili",andalo,montagne,"giochi e sport"}
1526	{edifici,uomini,fontane,militari}
1525	{edifici,uomini,fontane,persone,militari}
1328	{edifici,"funzioni religiose",uomini,fontane,militari}
1922	{edifici,uomini,fontane,militari}
1261	{montagne,edifici,uomini,militari,agricoltura,molveno}
710	{edifici,uomini,militari}
4480	{edifici,uomini,militari,"mezzi di trasporto",viabilità,rocchetta}
2274	{edifici,uomini,militari}
391	{strumenti,uomini,militari,"lavori maschili"}
1485	{edifici,uomini,persone,militari,"giochi e sport"}
3942	{edifici,uomini,persone,cles,militari,valle,boschi,mestieri,viabilità,rocchetta}
3778	{strumenti,uomini,persone,fai,mezzolombardo,militari,valle,boschi,mestieri,udine,paganella,montagne}
952	{edifici,uomini,alberghi,militari,montagne}
1000	{edifici,uomini,alberghi,militari,montagne}
2720	{edifici,uomini,alberghi,militari,molveno,montagne}
3197	{edifici,"edifici religiosi",uomini,persone,militari,emigrazione,religiosi}
1251	{uomini,militari,"mezzi di trasporto",viabilità}
2186	{edifici,"edifici religiosi","funzioni religiose",uomini,persone,militari,bambini,"servizi pubblici",istruzione}
3574	{edifici,"edifici religiosi","funzioni religiose",coscritti,uomini,persone,militari}
4135	{edifici,"edifici religiosi","funzioni religiose",coscritti,uomini,persone,militari,"lavori femminili",cavedago}
2095	{uomini,persone,militari}
4131	{cavedago,viabilità,molveno,montagne,edifici,"edifici religiosi","funzioni religiose",tenno,coscritti,uomini,persone,militari,"lavori femminili"}
4133	{viabilità,cavedago,molveno,montagne,"giochi e sport",edifici,"edifici religiosi","funzioni religiose",coscritti,tenno,uomini,persone,militari}
3609	{"giochi e sport",edifici,"edifici religiosi","funzioni religiose",coscritti,uomini,persone,alberghi,militari,bambini,istruzione}
3827	{edifici,"edifici religiosi","funzioni religiose",uomini,persone,militari,bambini,istruzione,cavedago}
1861	{uomini,persone,militari}
4124	{edifici,"edifici religiosi","funzioni religiose",coscritti,persone,uomini,militari,cavedago}
4121	{edifici,"edifici religiosi","funzioni religiose",coscritti,persone,uomini,militari,"lavori femminili",cavedago}
4136	{viabilità,cavedago,molveno,montagne,edifici,"edifici religiosi","funzioni religiose",coscritti,tenno,uomini,persone,militari}
4137	{cavedago,viabilità,molveno,montagne,edifici,"edifici religiosi","funzioni religiose",coscritti,tenno,uomini,persone,militari}
2230	{uomini,persone,militari,bambini,istruzione,"lavori femminili",baldo}
2373	{edifici,"edifici religiosi","funzioni religiose",uomini,persone,militari,feste,bambini,istruzione,cavedago}
2310	{edifici,uomini,persone,militari,istruzione,cavedago}
2783	{cavedago,religiosi,edifici,"edifici religiosi","funzioni religiose",coscritti,uomini,persone,alberghi,militari,istruzione,"lavori femminili"}
4134	{"lavori femminili",cavedago,religiosi,edifici,"edifici religiosi","funzioni religiose",coscritti,uomini,persone,alberghi,militari,istruzione}
320	{uomini,persone,militari,abbigliamento,feste,"lavori femminili","giochi e sport",montagne}
1002	{edifici,strumenti,allevamento,uomini,militari,bambini,"mezzi di trasporto",donne,boschi,allevamento,viabilità}
2680	{edifici,uomini,militari,montagne}
1403	{edifici,alberghi,molveno}
1464	{edifici,uomini,militari,turismo,montagne}
786	{edifici,uomini,persone,trento,militari,turismo,"lavori maschili","giochi e sport",montagne}
2589	{edifici,uomini,persone,militari,trento,turismo,"lavori maschili",montagne,"giochi e sport"}
1052	{edifici,uomini,militari,montagne}
2537	{edifici,uomini,militari,istruzione,turismo,andalo,montagne}
2924	{edifici,uomini,persone,militari,montagne}
3588	{andalo,montagne,edifici,uomini,militari,feste,istruzione,boschi}
2496	{edifici,animali,allevamento,uomini,militari,alimentazione,toscana,montagne}
1819	{andalo,montagne,paganella,"giochi e sport",edifici,uomini,alberghi,persone,militari}
3981	{edifici,uomini,militari,montagne}
789	{edifici,uomini,alberghi,militari,toscana,turismo,andalo,montagne}
881	{"lavori maschili",andalo,montagne,"giochi e sport",edifici,"edifici religiosi",uomini,alberghi,persone,militari,"servizi pubblici"}
2534	{"lavori maschili",andalo,montagne,"giochi e sport",edifici,"edifici religiosi",uomini,alberghi,persone,militari,"servizi pubblici"}
3520	{persone,turismo,religiosi}
2598	{edifici,uomini,alberghi,militari,toscana,turismo,andalo,montagne}
791	{edifici,"edifici religiosi",uomini,alberghi,persone,militari,toscana,istruzione,andalo,montagne}
1212	{durchschlag,persone,uomini,militari,feste,mestieri,"lavori maschili"}
1458	{edifici,alberghi}
793	{edifici,uomini,alberghi,persone,militari,"servizi pubblici",sanità,turismo,andalo,montagne,paganella}
849	{edifici,"edifici religiosi",uomini,persone,militari,sanità,istruzione,andalo,montagne}
851	{edifici,uomini,persone,alberghi,militari,sanità,istruzione,turismo,andalo,montagne,"giochi e sport",paganella}
829	{edifici,uomini,persone,alberghi,militari,sanità,istruzione,andalo,"giochi e sport",paganella,montagne}
1095	{edifici,uomini,persone,alberghi,militari,sanità,istruzione,turismo,paganella,montagne,"giochi e sport"}
1456	{edifici,alberghi}
1454	{edifici,alberghi,"servizi pubblici"}
3181	{edifici,alberghi}
1887	{edifici,uomini,persone,alberghi,militari,sanità,istruzione,turismo,andalo,montagne,"giochi e sport",paganella}
817	{"lavori maschili",andalo,montagne,paganella,edifici,"edifici religiosi",uomini,persone,alberghi,militari,"servizi pubblici",sanità,istruzione}
616	{edifici,uomini,persone,militari,sanità,turismo,andalo,montagne}
615	{edifici,uomini,persone,militari,sanità,turismo,andalo,montagne}
738	{edifici,uomini,persone,militari,sanità,andalo,montagne}
2543	{edifici,uomini,persone,militari,sanità,istruzione,turismo,viabilità,andalo,montagne}
2539	{edifici,uomini,persone,militari,sanità,turismo,andalo,montagne}
3595	{edifici,uomini,persone,militari,sanità,andalo,montagne}
608	{edifici,"edifici religiosi",uomini,persone,militari,sanità,turismo,andalo,montagne}
773	{edifici,"edifici religiosi",uomini,persone,militari,sanità,turismo,montagne}
1880	{edifici,"edifici religiosi",uomini,persone,militari,sanità,turismo,andalo,montagne}
2538	{edifici,"edifici religiosi",uomini,persone,militari,sanità,turismo,andalo,montagne}
2558	{edifici,"edifici religiosi",uomini,persone,militari,sanità,turismo,andalo,montagne}
317	{edifici,"edifici religiosi",uomini,persone,militari,sanità,istruzione,andalo,montagne}
354	{edifici,"edifici religiosi",uomini,persone,militari,sanità,istruzione,turismo,andalo,montagne}
603	{edifici,"edifici religiosi",uomini,persone,militari,sanità,istruzione,andalo,montagne}
1146	{edifici,"edifici religiosi",uomini,persone,militari,sanità,istruzione,montagne}
2540	{edifici,"edifici religiosi",uomini,persone,militari,sanità,istruzione,turismo,andalo,montagne}
2542	{edifici,"edifici religiosi",uomini,persone,militari,sanità,istruzione,turismo,andalo,montagne}
2565	{edifici,"edifici religiosi",uomini,persone,militari,sanità,istruzione,andalo,montagne}
2544	{edifici,"edifici religiosi",uomini,persone,militari,feste,"servizi pubblici",sanità,istruzione,turismo,andalo,montagne}
1455	{edifici,alberghi,agricoltura}
1457	{edifici,alberghi,turismo}
2632	{andalo,montagne,edifici,"edifici religiosi",uomini,persone,militari,feste,sanità,istruzione}
1882	{edifici,uomini,persone,alberghi,militari,toscana,sanità,agricoltura,"lavori maschili",andalo,paganella,montagne}
1859	{edifici,uomini,persone,militari,riva,sanità,turismo,"lavori maschili",andalo,montagne}
788	{edifici,uomini,persone,alberghi,militari,toscana,sanità,istruzione,boschi,turismo,andalo,montagne,"giochi e sport"}
2572	{edifici,"edifici religiosi",uomini,persone,militari,"servizi pubblici",sanità,istruzione,turismo,"lavori maschili",andalo,montagne}
1881	{andalo,montagne,edifici,"edifici religiosi",uomini,alberghi,persone,militari,toscana,sanità,istruzione,boschi,turismo,agricoltura,"lavori maschili"}
1210	{persone,feste,istruzione,mestieri,"lavori maschili"}
4471	{persone,mestieri,"lavori maschili"}
377	{persone,mestieri,"lavori femminili","lavori maschili"}
3700	{edifici,persone,mestieri,"lavori maschili",cavedago,montagne}
1267	{edifici,alberghi,viabilità,molveno,montagne}
3128	{edifici,persone,religiosi,"giochi e sport"}
3795	{persone,fai,religiosi}
3521	{persone,turismo,religiosi}
3702	{edifici,persone,valle,turismo,ori,religiosi,montagne}
3619	{persone,turismo,agricoltura,religiosi,"giochi e sport"}
3618	{persone,turismo,agricoltura,religiosi,"giochi e sport"}
3745	{edifici,uomini,persone,militari,religiosi,paganella,montagne}
2391	{persone,religiosi,andalo}
2396	{"funzioni religiose",persone,feste,toscana,religiosi}
2390	{"funzioni religiose",persone,mezzolombardo,feste,religiosi}
2394	{"funzioni religiose",persone,mezzolombardo,feste,religiosi}
2393	{"funzioni religiose",persone,feste,sanità,religiosi}
2389	{"funzioni religiose",uomini,persone,militari,drena,toscana,religiosi}
2387	{montagne,edifici,"funzioni religiose",uomini,persone,militari,mezzolombardo,toscana,istruzione,"lavori femminili",religiosi}
1528	{persone,religiosi}
501	{persone,religiosi}
2070	{persone,religiosi}
1529	{persone,religiosi}
4174	{africa,spormaggiore,persone,religiosi}
621	{"funzioni religiose",persone,religiosi}
622	{"funzioni religiose",persone,religiosi}
623	{"funzioni religiose",persone,religiosi}
2148	{"funzioni religiose",persone,religiosi}
3796	{edifici,persone,abbigliamento,religiosi}
274	{edifici,persone,abbigliamento,feste,canton,turismo}
942	{persone,religiosi}
334	{religiosi,andalo,"giochi e sport",edifici,"edifici religiosi","funzioni religiose",persone,spormaggiore}
4193	{"mezzi di trasporto",viabilità}
2468	{"mezzi di trasporto",emigrazione,viabilità,"lavori maschili"}
3028	{"mezzi di trasporto",agricoltura,viabilità,"lavori maschili"}
3030	{"mezzi di trasporto",viabilità,"lavori maschili"}
2606	{"mezzi di trasporto",viabilità,molveno,montagne}
4423	{persone,"mezzi di trasporto",viabilità,"lavori maschili"}
1221	{"mezzi di trasporto",viabilità}
1213	{"mezzi di trasporto",viabilità,montagne}
1932	{animali,allevamento,persone}
3483	{animali,allevamento,fai,boschi}
3426	{animali,allevamento,boschi,allevamento}
1947	{edifici,persone,"lavori maschili"}
3848	{edifici,"lavori maschili",cavedago,viabilità}
3838	{edifici,"lavori maschili",viabilità,cavedago}
3607	{edifici,"edifici religiosi","lavori maschili",viabilità,cavedago,montagne}
1699	{uomini,mestieri,"lavori maschili"}
1929	{uomini,mestieri,"lavori maschili"}
465	{"funzioni religiose",persone,feste,bambini}
548	{"funzioni religiose",persone,feste,istruzione,priori,boschi,mestieri,cavedago,montagne}
2774	{"funzioni religiose",persone,feste,istruzione,priori,boschi,mestieri,cavedago,montagne}
390	{"funzioni religiose",uomini,militari,feste}
2952	{edifici,alberghi}
984	{edifici,alberghi,paganella}
1087	{andalo,montagne,edifici,alberghi,"servizi pubblici",istruzione}
1091	{andalo,montagne,edifici,alberghi,"servizi pubblici",istruzione}
1141	{edifici,"edifici religiosi",uomini,alberghi,militari,toscana,andalo,montagne}
1083	{edifici,"edifici religiosi",alberghi,riva,istruzione,andalo,montagne}
1710	{edifici,"edifici religiosi","funzioni religiose",persone,oggetti,abbigliamento,istruzione,religiosi}
1702	{edifici,"edifici religiosi","funzioni religiose",persone,oggetti,abbigliamento,istruzione,religiosi}
2944	{edifici,"edifici religiosi","funzioni religiose",persone,oggetti,abbigliamento,istruzione,religiosi}
3779	{uomini,persone,oggetti,fai,militari,abbigliamento,feste,"servizi pubblici","lavori femminili",paganella,montagne}
3311	{"giochi e sport",paganella,uomini,persone,oggetti,militari,abbigliamento,bambini,istruzione,"lavori femminili"}
2411	{persone,oggetti,trento,abbigliamento,drena,istruzione,religiosi}
2412	{religiosi,montagne,edifici,animali,allevamento,alberghi,persone,oggetti,trento,abbigliamento,drena,istruzione}
1086	{edifici,"edifici religiosi",alberghi,turismo,andalo}
2890	{edifici,"edifici religiosi",alberghi,istruzione,paganella,montagne}
1089	{andalo,montagne,edifici,alberghi,"servizi pubblici",istruzione}
1432	{edifici,"edifici religiosi",istruzione}
3656	{montagne,edifici,alberghi,"servizi pubblici","mezzi di trasporto",viabilità}
3474	{edifici,alberghi,turismo,cavedago}
1695	{persone,mestieri,"lavori maschili"}
443	{persone,mestieri,"lavori femminili","lavori maschili",montagne}
1253	{persone,mestieri,"lavori maschili",viabilità}
261	{edifici,persone,uomini,mestieri,"lavori maschili"}
3539	{persone,uomini,militari,emigrazione,donne,mestieri,"lavori femminili",cavedago}
1716	{edifici,"edifici religiosi",persone,abbigliamento,turismo}
359	{edifici,"edifici religiosi","servizi pubblici",viabilità}
2321	{animali,persone,"caccia e pesca"}
2945	{edifici,animali,"servizi pubblici","caccia e pesca"}
2319	{strumenti,alimentazione}
4084	{edifici,strumenti,persone,alimentazione,montagne}
290	{istruzione,"giochi e sport"}
297	{"giochi e sport",fai,toscana,istruzione,molveno}
72	{carnevale,feste,istruzione,"giochi e sport"}
289	{andalo,"giochi e sport",persone,emigrazione,sanità,istruzione,molveno}
298	{andalo,"giochi e sport",persone,sanità,istruzione}
304	{andalo,"giochi e sport",persone,feste,sanità,istruzione}
299	{persone,carnevale,feste,istruzione,andalo,"giochi e sport"}
1723	{edifici,persone,alberghi,"servizi pubblici","mezzi di trasporto",mestieri,canton,"lavori maschili",viabilità,cavedago}
2771	{edifici,persone,alberghi,"servizi pubblici","mezzi di trasporto",mestieri,canton,"lavori maschili",viabilità,cavedago}
683	{edifici,alberghi,persone,boschi,"lavori maschili",andalo}
684	{edifici,persone,riva,"servizi pubblici","lavori maschili",montagne}
2595	{edifici,persone,boschi,"lavori maschili",andalo,"giochi e sport",montagne}
735	{edifici,"edifici religiosi",persone,"servizi pubblici",turismo,"lavori maschili",andalo,montagne}
953	{edifici,"edifici religiosi","servizi pubblici","lavori maschili",andalo,montagne}
353	{edifici,uomini,persone,militari,"mezzi di trasporto",emigrazione,turismo,"lavori maschili",andalo,"giochi e sport",montagne}
602	{andalo,montagne,edifici,"edifici religiosi",uomini,persone,militari,"servizi pubblici",turismo,"lavori maschili"}
1265	{persone,lava,abbigliamento,montagne}
3358	{persone,abbigliamento,cavedago}
1694	{persone,"mezzi di trasporto",viabilità,religiosi}
1428	{edifici,"edifici religiosi",istruzione}
1442	{edifici,"edifici religiosi",istruzione}
1758	{edifici,"edifici religiosi",spormaggiore,feste}
1436	{edifici,"edifici religiosi",istruzione}
1425	{edifici,"edifici religiosi",istruzione}
1440	{edifici,"edifici religiosi",istruzione}
1429	{edifici,"edifici religiosi",istruzione}
1427	{edifici,"edifici religiosi",istruzione}
1435	{edifici,"edifici religiosi",istruzione}
1430	{edifici,"edifici religiosi",istruzione}
1431	{edifici,"edifici religiosi",istruzione}
1434	{edifici,"edifici religiosi",istruzione}
1426	{edifici,"edifici religiosi",istruzione}
1439	{edifici,"edifici religiosi",istruzione}
1438	{edifici,"edifici religiosi",istruzione}
1437	{edifici,"edifici religiosi",istruzione}
1433	{edifici,"edifici religiosi",istruzione}
1443	{edifici,"edifici religiosi",istruzione}
1523	{edifici,"edifici religiosi",emigrazione,istruzione}
1441	{edifici,"edifici religiosi",istruzione}
1805	{edifici,"edifici religiosi","funzioni religiose",feste}
2234	{edifici,"edifici religiosi",persone,toscana,"lavori femminili",religiosi,andalo}
2030	{edifici,"edifici religiosi"}
2371	{edifici,"edifici religiosi",cavedago}
1573	{edifici,"edifici religiosi",spormaggiore,viabilità}
2361	{edifici,"edifici religiosi","funzioni religiose"}
3914	{edifici,"edifici religiosi","funzioni religiose"}
2032	{edifici,"edifici religiosi",persone,cavedago}
2362	{edifici,"edifici religiosi","funzioni religiose"}
288	{edifici,"edifici religiosi",fontane}
3881	{edifici,"edifici religiosi","funzioni religiose"}
3973	{edifici,"edifici religiosi","funzioni religiose"}
3928	{edifici,"edifici religiosi","funzioni religiose"}
3927	{edifici,"edifici religiosi","funzioni religiose"}
3245	{edifici,"edifici religiosi"}
3915	{edifici,"edifici religiosi","funzioni religiose"}
3922	{edifici,"edifici religiosi","funzioni religiose"}
3972	{edifici,"edifici religiosi","funzioni religiose","servizi pubblici"}
3974	{edifici,"edifici religiosi","funzioni religiose"}
3926	{edifici,"edifici religiosi","funzioni religiose"}
3971	{edifici,"edifici religiosi","funzioni religiose"}
1061	{edifici,rifugi,roda,turismo,montagne}
4051	{edifici,"edifici religiosi",trento,cavedago}
3929	{edifici,"edifici religiosi","funzioni religiose"}
4048	{edifici,"edifici religiosi",persone,trento,istruzione,cavedago}
3923	{edifici,"edifici religiosi","funzioni religiose"}
4027	{edifici,"edifici religiosi",persone,trento,bambini,"lavori femminili",cavedago}
4055	{edifici,"edifici religiosi",trento,cavedago}
3970	{edifici,"edifici religiosi","funzioni religiose"}
4080	{edifici,"edifici religiosi",persone,trento,cavedago}
3924	{edifici,"edifici religiosi","funzioni religiose"}
4077	{edifici,"edifici religiosi",persone,trento,cavedago}
4028	{"giochi e sport",edifici,"edifici religiosi",persone,feste,bambini,"lavori femminili",cavedago,viabilità}
4049	{edifici,"edifici religiosi",persone,trento,istruzione,cavedago}
216	{edifici,"edifici religiosi",cavedago,montagne}
1722	{edifici,"edifici religiosi",persone,bambini,istruzione,cavedago}
2370	{edifici,"edifici religiosi","funzioni religiose",persone,bambini,istruzione,cavedago}
1831	{edifici,"edifici religiosi",cavedago}
4264	{edifici,"edifici religiosi",spormaggiore}
2873	{edifici,"edifici religiosi",coscritti,persone,uomini,bambini,istruzione,donne,cavedago}
2365	{edifici,"edifici religiosi","funzioni religiose",persone,mezzolombardo,"servizi pubblici"}
2364	{edifici,"edifici religiosi","funzioni religiose",persone,mezzolombardo,"servizi pubblici"}
2683	{edifici,"edifici religiosi","funzioni religiose",persone,religiosi}
2713	{edifici,"edifici religiosi","funzioni religiose",persone,religiosi}
3828	{edifici,"edifici religiosi","funzioni religiose",coscritti,uomini,persone,cavedago}
3716	{edifici,"edifici religiosi",persone,istruzione,cavedago}
1838	{edifici,"edifici religiosi",viabilità,montagne}
2776	{edifici,"edifici religiosi",boschi,turismo,agricoltura,"giochi e sport",montagne}
3847	{edifici,"edifici religiosi","giochi e sport",montagne}
3604	{"giochi e sport",montagne,edifici,"edifici religiosi",bedolè,alberghi,cavedago}
1235	{edifici,"edifici religiosi",persone,agricoltura,cavedago,viabilità,montagne,"giochi e sport"}
4112	{edifici,"edifici religiosi",persone,cavedago,viabilità,montagne}
4113	{edifici,"edifici religiosi",persone,cavedago,viabilità,montagne}
218	{edifici,"edifici religiosi",boschi,agricoltura,montagne}
2775	{edifici,"edifici religiosi",boschi,agricoltura,cavedago,montagne}
4108	{edifici,"edifici religiosi",viabilità,montagne}
3844	{edifici,"edifici religiosi",boschi,montagne}
3846	{edifici,"edifici religiosi",boschi,montagne}
3840	{edifici,"edifici religiosi",viabilità,montagne}
4117	{montagne,edifici,"edifici religiosi",viabilità,cavedago}
3606	{edifici,"edifici religiosi",boschi,agricoltura,cavedago,montagne}
2874	{edifici,"funzioni religiose","edifici religiosi",persone,"lavori femminili"}
3968	{edifici,"edifici religiosi",uomini,militari,cavedago}
3959	{edifici,"edifici religiosi",uomini,militari,cavedago}
3952	{edifici,"edifici religiosi",uomini,militari,cavedago}
3963	{edifici,"edifici religiosi",uomini,militari,"servizi pubblici",cavedago}
3961	{edifici,"edifici religiosi",uomini,militari,cavedago}
3953	{edifici,"edifici religiosi",uomini,militari,cavedago}
3951	{edifici,"edifici religiosi",uomini,militari,cavedago}
3969	{edifici,"edifici religiosi",uomini,militari,cavedago}
3962	{edifici,"edifici religiosi",uomini,militari,cavedago}
3964	{edifici,"edifici religiosi",uomini,militari,cavedago}
3956	{edifici,"edifici religiosi",uomini,persone,militari,cavedago}
3958	{edifici,"edifici religiosi",uomini,militari,cavedago}
272	{edifici,"edifici religiosi",uomini,persone,militari,bambini,istruzione,cavedago}
3688	{"giochi e sport",edifici,"edifici religiosi",uomini,militari,feste,istruzione,cavedago}
4120	{edifici,"edifici religiosi","funzioni religiose",coscritti,uomini,persone,militari,cavedago}
4119	{edifici,"edifici religiosi","funzioni religiose",coscritti,uomini,persone,militari,cavedago}
1832	{edifici,"edifici religiosi",boschi,turismo,"lavori maschili",viabilità,cavedago,montagne}
1951	{edifici,"edifici religiosi","lavori maschili",viabilità,montagne}
1875	{edifici,"edifici religiosi","lavori maschili",viabilità,montagne}
3839	{edifici,"edifici religiosi",valle,boschi,"lavori maschili",viabilità,"giochi e sport"}
276	{edifici,"edifici religiosi",persone,cavedago,religiosi}
3738	{montagne,edifici,"edifici religiosi","lavori maschili",viabilità,cavedago}
4065	{montagne,"giochi e sport",edifici,"edifici religiosi",persone,trento,"lavori maschili",viabilità,cavedago}
4095	{montagne,"giochi e sport",edifici,"edifici religiosi",persone,trento,"lavori maschili",cavedago,viabilità}
3712	{edifici,"edifici religiosi",persone,cavedago,religiosi}
2681	{"funzioni religiose",persone,religiosi}
813	{edifici,"funzioni religiose",persone,cavedago,religiosi}
820	{edifici,"funzioni religiose",persone,cavedago,religiosi}
826	{edifici,"edifici religiosi","funzioni religiose",persone,cavedago,religiosi}
255	{persone,religiosi}
433	{persone,spormaggiore,religiosi}
434	{persone,spormaggiore,religiosi}
824	{persone,cavedago,religiosi,pergine}
3573	{persone,"mezzi di trasporto",cavedago,religiosi}
4224	{persone,spormaggiore,religiosi}
1900	{"funzioni religiose",persone,religiosi,paganella}
4225	{persone,spormaggiore,religiosi}
3714	{edifici,persone,"lavori femminili",cavedago,religiosi}
1222	{"funzioni religiose",spormaggiore,persone,bambini,istruzione,"lavori femminili",religiosi}
2021	{edifici,coscritti,uomini,persone,fai,feste,emigrazione,"lavori femminili",cavedago,religiosi}
2872	{edifici,coscritti,uomini,persone,fai,feste,emigrazione,"lavori femminili",cavedago,religiosi}
3165	{paganella,edifici,"funzioni religiose",fontane,persone,bambini,istruzione,religiosi}
821	{edifici,uomini,persone,militari,"servizi pubblici","lavori femminili",cavedago,religiosi}
4472	{edifici,"edifici religiosi",persone,spormaggiore,trento,spor,agricoltura,religiosi}
1490	{edifici,"edifici religiosi","funzioni religiose",persone,drena,"servizi pubblici",istruzione,viabilità,religiosi}
3932	{"funzioni religiose",persone,bambini,istruzione,cavedago,religiosi}
4538	{persone,feste,istruzione,religiosi}
4157	{spormaggiore,persone,bambini,istruzione,"lavori femminili",cavedago,religiosi}
1048	{cavedago,religiosi,paganella,edifici,"edifici religiosi","funzioni religiose",persone,fai,bambini,istruzione}
3715	{persone,istruzione,cavedago,religiosi}
3676	{"funzioni religiose",persone,feste,bambini,istruzione,priori,boschi,agricoltura,religiosi}
1704	{persone,bambini,istruzione,boschi,religiosi}
2637	{"funzioni religiose",padova,persone,istruzione,cavedago,religiosi}
342	{"lavori femminili",viabilità,religiosi,andalo,edifici,"edifici religiosi","funzioni religiose",spormaggiore,persone,sanità,istruzione}
2250	{"funzioni religiose",persone,bambini,istruzione,"lavori femminili",cavedago,religiosi}
2855	{"funzioni religiose",persone,bambini,istruzione,"lavori femminili",cavedago,religiosi}
3669	{persone,abbigliamento,feste,bambini,donne,istruzione,priori,boschi,cavedago,religiosi}
2420	{persone,uomini,militari,religiosi}
341	{andalo,"funzioni religiose",persone,uomini,militari,"lavori femminili",viabilità,religiosi}
822	{edifici,uomini,persone,militari,feste,emigrazione,istruzione,cavedago,religiosi}
2711	{persone,bambini,"lavori femminili",religiosi}
1003	{edifici,persone,uomini,spormaggiore,militari,feste,istruzione,cavedago,religiosi}
2828	{"funzioni religiose",uomini,persone,militari,cavedago,religiosi}
3413	{edifici,uomini,persone,militari,"servizi pubblici","lavori femminili",cavedago,religiosi}
1718	{edifici,persone,uomini,fontane,spormaggiore,militari,"lavori femminili",religiosi}
293	{edifici,"funzioni religiose",uomini,persone,spormaggiore,militari,abbigliamento,bambini,istruzione,cavedago,religiosi}
4130	{"lavori femminili",cavedago,viabilità,religiosi,molveno,montagne,edifici,"edifici religiosi","funzioni religiose",coscritti,tenno,uomini,persone,militari}
4132	{"lavori femminili",viabilità,cavedago,religiosi,molveno,montagne,"giochi e sport",edifici,"edifici religiosi","funzioni religiose",coscritti,tenno,uomini,persone,militari}
1651	{edifici,"edifici religiosi","funzioni religiose",persone,uomini,militari,religiosi}
619	{persone,bambini,religiosi}
2483	{edifici,persone,alberghi,riva,feste,istruzione,religiosi}
3230	{religiosi,paganella,edifici,"edifici religiosi","funzioni religiose",persone}
4052	{edifici,"edifici religiosi",persone,trento,cavedago,religiosi}
2826	{edifici,"edifici religiosi","funzioni religiose",persone,religiosi}
4054	{edifici,"edifici religiosi",persone,trento,cavedago,religiosi}
2830	{edifici,"edifici religiosi","funzioni religiose",coscritti,uomini,persone,feste,cavedago,religiosi}
3724	{persone,istruzione,cavedago,religiosi}
2768	{edifici,"edifici religiosi","funzioni religiose",coscritti,uomini,persone,cavedago,religiosi}
552	{edifici,"edifici religiosi",persone,bambini,"servizi pubblici",istruzione,"lavori femminili",cavedago,religiosi}
1727	{edifici,"edifici religiosi",persone,bambini,"servizi pubblici",istruzione,"lavori femminili",cavedago,religiosi}
3955	{edifici,"edifici religiosi",persone,bambini,"servizi pubblici",istruzione,"lavori femminili",cavedago,religiosi}
3954	{edifici,"edifici religiosi",persone,bambini,"servizi pubblici",istruzione,"lavori femminili",cavedago,religiosi}
2875	{montagne,edifici,"edifici religiosi","funzioni religiose",persone,alberghi,bambini,toscana,istruzione,religiosi}
4139	{edifici,"edifici religiosi","funzioni religiose",coscritti,uomini,persone,militari,cavedago,religiosi}
4138	{edifici,"edifici religiosi","funzioni religiose",coscritti,uomini,persone,militari,istruzione,cavedago,religiosi}
921	{edifici,"edifici religiosi",persone,spormaggiore,abbigliamento,religiosi}
2831	{edifici,"funzioni religiose",persone,canton,cavedago,religiosi,montagne}
2758	{uomini,persone,militari,emigrazione,cavedago,religiosi}
3903	{alimentazione,donne,agricoltura,verdura}
4320	{alimentazione,agricoltura,verdura}
2073	{verdura,montagne,edifici,alimentazione,agricoltura}
3103	{persone,alimentazione,agricoltura,verdura}
3945	{verdura,"giochi e sport",animali,allevamento,persone,alimentazione,"mezzi di trasporto",boschi,mestieri,agricoltura,viabilità,"lavori maschili"}
2161	{verdura,edifici,uomini,militari,alimentazione,agricoltura}
4615	{animali,allevamento}
1584	{animali,allevamento,boschi}
1219	{edifici,animali,allevamento,"servizi pubblici",viabilità}
1869	{edifici,animali,allevamento,montagne}
1238	{edifici,alberghi,molveno}
3534	{edifici,alberghi,turismo}
1321	{edifici,alberghi,europa,viabilità,molveno}
1292	{edifici,alberghi,europa,viabilità,molveno}
983	{edifici,alberghi,feste,turismo,viabilità,montagne}
3533	{edifici,alberghi,boschi,turismo,montagne}
1183	{edifici,alberghi,molveno,montagne}
2340	{edifici,alberghi}
597	{edifici,alberghi,persone,turismo,andalo,montagne}
1142	{edifici,"edifici religiosi",alberghi,feste,turismo,montagne}
2587	{edifici,"edifici religiosi",alberghi,feste,turismo,montagne}
2852	{edifici,"edifici religiosi",alberghi,feste,turismo,montagne}
1748	{edifici,"edifici religiosi",alberghi,andalo,montagne}
859	{andalo,montagne,paganella,edifici,"edifici religiosi",animali,allevamento,alberghi,persone,feste,"servizi pubblici"}
2599	{edifici,alberghi,molveno}
878	{andalo,montagne,paganella,edifici,"edifici religiosi",animali,allevamento,alberghi,persone,feste,"servizi pubblici"}
3798	{edifici,strumenti,alberghi,uomini,persone,militari,"mezzi di trasporto",viabilità}
850	{andalo,montagne,edifici,uomini,persone,alberghi,militari,toscana,"servizi pubblici",sanità}
781	{montagne,edifici,"edifici religiosi",uomini,alberghi,persone,militari,"servizi pubblici",sanità,turismo}
792	{andalo,montagne,edifici,"edifici religiosi",uomini,alberghi,persone,militari,"servizi pubblici",sanità,turismo}
1137	{andalo,montagne,edifici,"edifici religiosi",uomini,alberghi,persone,militari,"servizi pubblici",sanità,turismo}
1883	{andalo,montagne,edifici,"edifici religiosi",uomini,alberghi,persone,militari,"servizi pubblici",sanità,turismo}
2551	{edifici,"edifici religiosi",uomini,alberghi,persone,militari,toscana,"servizi pubblici",sanità,turismo,andalo,montagne}
780	{montagne,edifici,uomini,persone,alberghi,militari,toscana,"servizi pubblici",sanità,turismo}
1878	{montagne,edifici,uomini,persone,alberghi,militari,toscana,"servizi pubblici",sanità,turismo}
655	{edifici,"edifici religiosi",alberghi,persone,feste,turismo,"lavori maschili",viabilità,andalo,montagne}
2795	{edifici,alberghi,"servizi pubblici","mezzi di trasporto",boschi,viabilità,montagne}
3467	{persone,religiosi}
4600	{persone,religiosi}
1177	{"mezzi di trasporto",mestieri,"caccia e pesca",viabilità,molveno,montagne}
1090	{edifici,alberghi,mestieri,"caccia e pesca"}
1093	{edifici,allevamento,mestieri,"caccia e pesca",allevamento,montagne}
4192	{persone,oggetti,abbigliamento}
1378	{persone,oggetti,abbigliamento}
1276	{persone,oggetti,abbigliamento}
1191	{persone,uomini,oggetti,militari,abbigliamento}
2351	{uomini,persone,militari,mestieri,visenz,"lavori maschili",viabilità}
3097	{edifici,coscritti,uomini,persone,militari,abbigliamento,feste,bambini,istruzione,mestieri,"lavori maschili",religiosi}
583	{edifici,uomini,alberghi,persone,militari,turismo,"lavori maschili",andalo,montagne,"giochi e sport"}
779	{edifici,alberghi,uomini,persone,militari,"lavori maschili",andalo,montagne}
2841	{persone,feste,mestieri,"lavori maschili"}
3631	{persone,feste,mestieri,"lavori maschili"}
3643	{persone,feste,mestieri,"lavori maschili"}
2087	{coscritti,uomini,persone,feste,mestieri,"lavori maschili"}
2832	{edifici,persone,uomini,militari,mestieri,"lavori maschili",paganella,montagne}
236	{persone,religiosi}
1780	{persone,bambini,religiosi}
1799	{persone,istruzione,religiosi}
715	{montagne,edifici,"edifici religiosi",alberghi,feste,"mezzi di trasporto",viabilità}
607	{edifici,"edifici religiosi",alberghi,viabilità,montagne}
4149	{edifici,"edifici religiosi","funzioni religiose",coscritti,uomini,persone,militari,feste,istruzione,boschi,cavedago,religiosi}
4153	{edifici,"edifici religiosi","funzioni religiose",boschi,cavedago}
1012	{persone,sci,"giochi e sport",paganella,montagne}
2787	{edifici,"edifici religiosi",istruzione,boschi}
3723	{edifici,strumenti,persone,agricoltura}
4549	{bambini,istruzione}
3481	{persone,bambini,istruzione}
2486	{edifici,persone,abbigliamento,feste,bambini,istruzione,priori,boschi,mestieri,cavedago}
424	{"funzioni religiose",persone,bambini,istruzione}
3453	{edifici,"funzioni religiose",persone,alberghi,bambini,istruzione}
2211	{edifici,"funzioni religiose",uomini,alberghi,persone,militari,feste,bambini,istruzione}
2428	{edifici,alberghi,persone,predazzo,bambini,istruzione,"lavori femminili",cavedago,"giochi e sport"}
755	{edifici,"edifici religiosi","funzioni religiose",persone,religiosi,andalo}
756	{edifici,"edifici religiosi","funzioni religiose",persone,religiosi,andalo}
2053	{persone,cavedago,religiosi}
2854	{persone,cavedago,religiosi}
303	{uomini,persone,militari,religiosi}
4066	{rifugi,edifici}
2745	{rifugi,edifici}
3385	{rifugi,edifici,persone}
4158	{"edifici religiosi","funzioni religiose",tenno,giudicarie,uomini,militari,feste,crozedei,boschi,cavedago,religiosi,paganella,montagne,garda,edifici,persone,istruzione,dolens,valle,viabilità,molveno}
707	{edifici,alberghi}
301	{"funzioni religiose",andalo,montagne,"giochi e sport",edifici,alberghi,persone,bambini}
1685	{"funzioni religiose",andalo,"giochi e sport",montagne,edifici,alberghi,persone,bambini}
582	{turismo,montagne,edifici,alberghi,"servizi pubblici"}
2593	{turismo,montagne,edifici,alberghi,"servizi pubblici"}
599	{"edifici religiosi",andalo,montagne,edifici,alberghi,"servizi pubblici"}
679	{feste,montagne,edifici,alberghi,"mezzi di trasporto"}
2628	{turismo,andalo,montagne,"giochi e sport",edifici,alberghi,"servizi pubblici",viabilità}
367	{"edifici religiosi",turismo,andalo,montagne,"giochi e sport",edifici,persone,alberghi,istruzione,"lavori maschili"}
2527	{"edifici religiosi",turismo,montagne,edifici,alberghi}
2594	{"edifici religiosi",feste,boschi,turismo,andalo,montagne,edifici,alberghi}
358	{"edifici religiosi",feste,turismo,andalo,montagne,edifici,alberghi,"servizi pubblici"}
2591	{"edifici religiosi",feste,turismo,andalo,montagne,edifici,alberghi,"servizi pubblici"}
2590	{"edifici religiosi",feste,turismo,andalo,montagne,edifici,alberghi,"servizi pubblici"}
357	{"edifici religiosi",feste,turismo,andalo,"giochi e sport",paganella,montagne,edifici,alberghi,"servizi pubblici",istruzione,"lavori maschili",viabilità}
2586	{"edifici religiosi",feste,turismo,andalo,paganella,"giochi e sport",montagne,edifici,alberghi,"servizi pubblici",istruzione,"lavori maschili",viabilità}
768	{"edifici religiosi",feste,andalo,montagne,edifici,alberghi,persone,"servizi pubblici","lavori maschili"}
351	{rifugi,andalo,paganella,edifici}
1062	{rifugi,edifici}
650	{rifugi,turismo,paganella,edifici}
2849	{uomini,militari,feste,boschi,turismo,andalo,montagne,"giochi e sport",edifici,alberghi,"servizi pubblici","lavori maschili"}
2584	{"edifici religiosi",uomini,militari,feste,turismo,andalo,"giochi e sport",montagne,edifici,alberghi,"servizi pubblici","lavori maschili"}
770	{uomini,militari,feste,turismo,andalo,"giochi e sport",montagne,edifici,alberghi,persone,"lavori maschili"}
2582	{uomini,militari,feste,turismo,andalo,"giochi e sport",montagne,edifici,alberghi,persone,"lavori maschili"}
545	{uomini,militari,feste,turismo,andalo,paganella,"giochi e sport",montagne,edifici,alberghi,"servizi pubblici","lavori maschili"}
2581	{"edifici religiosi",uomini,militari,turismo,andalo,"giochi e sport",paganella,montagne,edifici,alberghi,"servizi pubblici","lavori maschili"}
2583	{"edifici religiosi",uomini,militari,feste,turismo,andalo,montagne,"giochi e sport",edifici,alberghi,"servizi pubblici","lavori maschili"}
2585	{"edifici religiosi",uomini,militari,turismo,andalo,montagne,paganella,"giochi e sport",edifici,alberghi,"servizi pubblici","lavori maschili"}
775	{uomini,militari,feste,turismo,andalo,montagne,"giochi e sport",edifici,alberghi,persone,"lavori maschili"}
844	{animali,turismo,andalo,montagne,edifici,allevamento,alberghi,persone,mestieri}
979	{edifici,alberghi,viabilità}
680	{edifici,alberghi}
855	{"edifici religiosi",turismo,andalo,montagne,edifici,alberghi,"servizi pubblici"}
772	{"edifici religiosi",turismo,andalo,montagne,edifici,alberghi,"servizi pubblici"}
1118	{"edifici religiosi",turismo,andalo,montagne,edifici,alberghi,"servizi pubblici"}
664	{andalo,montagne,edifici,alberghi,"lavori maschili"}
816	{uomini,militari,feste,turismo,andalo,"giochi e sport",montagne,edifici,alberghi,"servizi pubblici","lavori maschili"}
860	{uomini,militari,feste,turismo,andalo,montagne,"giochi e sport",edifici,alberghi,"servizi pubblici","lavori maschili"}
1866	{uomini,militari,feste,turismo,andalo,"giochi e sport",montagne,edifici,alberghi,"servizi pubblici","lavori maschili"}
1957	{uomini,militari,feste,turismo,andalo,montagne,"giochi e sport",edifici,alberghi,persone,"servizi pubblici","lavori maschili"}
705	{"edifici religiosi",feste,montagne,edifici,alberghi,"servizi pubblici","mezzi di trasporto",viabilità}
3008	{"funzioni religiose",religiosi,persone}
2236	{"lavori femminili",abbigliamento,donne,istruzione}
3412	{"edifici religiosi","lavori femminili",cavedago,edifici,persone,abbigliamento,"mezzi di trasporto",donne,istruzione,viabilità}
1487	{rifugi,turismo,montagne,edifici}
338	{rifugi,montagne,paganella,edifici,persone}
835	{rifugi,agricoltura,turismo,andalo,montagne,"giochi e sport",edifici,allevamento}
2329	{rifugi,boschi,edifici,persone}
2922	{rifugi,roda,montagne,edifici}
3329	{rifugi,edifici,persone}
651	{trento,rifugi,turismo,andalo,paganella,montagne,edifici,alberghi}
1361	{"edifici religiosi",rifugi,montagne,edifici}
2655	{rifugi,montagne,edifici,alberghi}
663	{rifugi,allevamento,andalo,edifici,allevamento}
4183	{rifugi,allevamento,turismo,edifici,allevamento}
871	{rifugi,turismo,paganella,montagne,edifici}
3375	{uomini,militari,rifugi,edifici,persone}
587	{rifugi,turismo,montagne,edifici,crozzon}
1376	{religiosi,persone}
1336	{religiosi,persone}
2356	{religiosi,persone}
4305	{religiosi,persone}
4572	{"edifici religiosi","funzioni religiose",spormaggiore,religiosi,edifici,persone}
4175	{spormaggiore,religiosi,africa,persone}
264	{"funzioni religiose","edifici religiosi",religiosi,edifici,persone}
565	{"edifici religiosi",turismo,cavedago,edifici,persone,donne,viabilità}
4342	{"funzioni religiose",spormaggiore,religiosi,persone,istruzione}
4189	{"edifici religiosi",uomini,spormaggiore,militari,trento,"lavori femminili",religiosi,villazzano,edifici,persone,emigrazione,istruzione}
222	{uomini,militari,religiosi,persone,"servizi pubblici"}
1030	{"edifici religiosi","funzioni religiose",uomini,spormaggiore,militari,religiosi,edifici,persone,gorizia}
4401	{"funzioni religiose","edifici religiosi",spormaggiore,religiosi,edifici,persone}
162	{"edifici religiosi","funzioni religiose",uomini,spormaggiore,militari,feste,religiosi,edifici,persone}
2856	{"funzioni religiose",cavedago,religiosi,persone,bambini}
1855	{"edifici religiosi",edifici}
836	{"edifici religiosi",cavedago,edifici,persone,bambini}
2470	{"edifici religiosi",edifici,emigrazione}
1041	{"edifici religiosi",paganella,edifici,"servizi pubblici"}
2038	{"edifici religiosi",cavedago,edifici,persone}
754	{"edifici religiosi","funzioni religiose",andalo,edifici}
861	{"edifici religiosi",castrozza,turismo,edifici}
2472	{"edifici religiosi",edifici,persone,emigrazione}
1649	{"edifici religiosi",boschi,"lavori femminili",cavedago,edifici,"servizi pubblici"}
1856	{genova,"edifici religiosi",edifici,persone}
2467	{"edifici religiosi",edifici,persone,emigrazione}
3285	{"edifici religiosi",edifici}
2072	{"edifici religiosi",edifici}
2244	{"edifici religiosi",edifici}
4122	{"edifici religiosi",edifici}
1986	{"edifici religiosi",edifici}
1845	{"edifici religiosi",cavedago,edifici}
2298	{"edifici religiosi",edifici,valle,viabilità}
2253	{"edifici religiosi","funzioni religiose",edifici,persone}
3509	{"edifici religiosi",fai,paganella,montagne,edifici}
3624	{"edifici religiosi",montagne,paganella,edifici}
3416	{"edifici religiosi","giochi e sport",montagne,edifici,"servizi pubblici",viabilità}
4142	{"edifici religiosi",bedolè,montagne,edifici,viabilità}
4147	{"edifici religiosi",bedolè,cavedago,montagne,edifici,persone,viabilità}
2201	{"edifici religiosi",edifici,alberghi,bambini,viabilità}
3404	{"edifici religiosi","funzioni religiose",cavedago,"giochi e sport",edifici,istruzione,viabilità}
1051	{"edifici religiosi",bedolè,cavedago,"giochi e sport",montagne,edifici,persone}
1846	{"edifici religiosi",montagne,edifici}
3338	{"edifici religiosi",bedolè,cavedago,"giochi e sport",montagne,edifici,persone}
3208	{"edifici religiosi","funzioni religiose",cavedago,edifici,dolens}
2028	{"edifici religiosi",feste,carnevale,andalo,"giochi e sport",edifici,viabilità}
3852	{"edifici religiosi",edifici}
345	{"edifici religiosi","funzioni religiose","lavori femminili",edifici,istruzione}
1874	{"edifici religiosi",cavedago,edifici}
1873	{"edifici religiosi",cavedago,edifici}
1872	{"edifici religiosi",cavedago,edifici,viabilità}
3843	{"edifici religiosi",edifici}
1985	{"edifici religiosi",cavedago,edifici,viabilità}
4150	{"edifici religiosi",tenno,montagne,edifici,viabilità,molveno}
1842	{"edifici religiosi",andalo,edifici,viabilità}
1987	{"edifici religiosi",edifici,priori,viabilità}
1989	{"edifici religiosi",edifici,priori,viabilità}
3414	{"edifici religiosi",cavedago,edifici,persone,bambini}
1841	{"edifici religiosi",bedolè,boschi,cavedago,montagne,edifici}
2122	{"edifici religiosi","funzioni religiose",feste,sanità,edifici,persone}
1700	{"funzioni religiose","edifici religiosi",edifici,strumenti,persone,massenza,viabilità,molveno}
1843	{"edifici religiosi",cavedago,edifici,"mezzi di trasporto",viabilità}
3792	{"edifici religiosi",feste,edifici,persone,"mezzi di trasporto",viabilità}
1877	{"edifici religiosi",bedolè,tenno,canton,cavedago,montagne,edifici,alberghi,viabilità,molveno}
2779	{"edifici religiosi",bedolè,tenno,canton,cavedago,montagne,edifici,alberghi,viabilità,molveno}
3741	{"edifici religiosi",bedolè,tenno,canton,cavedago,montagne,edifici,alberghi,viabilità,molveno}
3742	{"edifici religiosi",bedolè,tenno,canton,cavedago,montagne,edifici,alberghi,viabilità,molveno}
3743	{"edifici religiosi",bedolè,tenno,canton,cavedago,montagne,edifici,alberghi,viabilità,molveno}
1988	{"edifici religiosi",bedolè,cavedago,montagne,"giochi e sport",edifici,alberghi}
3605	{"edifici religiosi",bedolè,cavedago,montagne,edifici,alberghi}
3405	{"edifici religiosi",bedolè,cavedago,"giochi e sport",montagne,edifici,"servizi pubblici"}
3608	{"edifici religiosi",montagne,edifici,viabilità}
1019	{"edifici religiosi",montagne,edifici,alberghi,persone,"servizi pubblici",istruzione}
2780	{"edifici religiosi",bedolè,boschi,turismo,montagne,edifici}
3408	{"edifici religiosi",agricoltura,edifici,agricoltura,alimentazione}
3407	{"edifici religiosi",agricoltura,edifici,agricoltura,alimentazione}
697	{"edifici religiosi",uomini,militari,edifici}
699	{"edifici religiosi",uomini,militari,edifici,istruzione}
2457	{"edifici religiosi","funzioni religiose",uomini,militari,feste,andalo,edifici}
2357	{"edifici religiosi","funzioni religiose",uomini,militari,feste,andalo,edifici}
3585	{"edifici religiosi",uomini,militari,montagne,edifici,"mezzi di trasporto",istruzione,benàco}
3587	{"edifici religiosi",uomini,militari,montagne,edifici,istruzione,benàco}
3581	{"edifici religiosi",uomini,militari,"lavori femminili",montagne,edifici,strumenti,alberghi,istruzione,benàco}
1078	{"edifici religiosi",uomini,militari,montagne,edifici}
3728	{"edifici religiosi",tenno,uomini,militari,cavedago,montagne,"giochi e sport",edifici,alberghi,"servizi pubblici",istruzione,viabilità,molveno}
656	{"edifici religiosi",uomini,militari,turismo,andalo,montagne,"giochi e sport",edifici,alberghi,toscana}
1742	{"edifici religiosi",andalo,montagne,edifici,alberghi,"servizi pubblici",istruzione}
1743	{"edifici religiosi",andalo,montagne,edifici,alberghi,"servizi pubblici",istruzione}
1744	{"edifici religiosi",andalo,montagne,edifici,alberghi,"servizi pubblici",istruzione}
1741	{"edifici religiosi",turismo,andalo,montagne,edifici,alberghi,toscana,istruzione}
1745	{"edifici religiosi",turismo,andalo,montagne,edifici,alberghi,toscana,istruzione}
1039	{"edifici religiosi",animali,"caccia e pesca",edifici,"servizi pubblici"}
1042	{"edifici religiosi","funzioni religiose",animali,"caccia e pesca",edifici,"servizi pubblici"}
1585	{"edifici religiosi",uomini,fontane,militari,trento,edifici,persone,abbigliamento,"lavori maschili"}
2301	{"edifici religiosi","funzioni religiose",edifici,persone}
3131	{"edifici religiosi",montagne,edifici,persone}
3845	{"edifici religiosi","giochi e sport",edifici}
2033	{"edifici religiosi",carnevale,feste,cavedago,andalo,edifici,persone,istruzione,viabilità}
2674	{"edifici religiosi","funzioni religiose",riva,cavedago,religiosi,edifici,persone,abbigliamento,istruzione,dolens}
3194	{"edifici religiosi","funzioni religiose",riva,cavedago,religiosi,edifici,persone,mezzolombardo,abbigliamento,istruzione,dolens}
3221	{"edifici religiosi","funzioni religiose",riva,cavedago,religiosi,edifici,persone,abbigliamento,istruzione,dolens}
4144	{"edifici religiosi",crozedei,cavedago,montagne,"giochi e sport",edifici}
4143	{"edifici religiosi",bedolè,crozedei,cavedago,montagne,"giochi e sport",edifici}
1948	{"edifici religiosi",cavedago,montagne,edifici,viabilità}
1840	{"edifici religiosi","lavori femminili",agricoltura,cavedago,andalo,montagne,edifici,strumenti,persone,alberghi,abbigliamento,mestieri,viabilità}
4128	{"edifici religiosi","lavori femminili",agricoltura,cavedago,andalo,montagne,edifici,strumenti,persone,alberghi,abbigliamento,mestieri,viabilità}
4064	{"edifici religiosi",trento,cavedago,"giochi e sport",edifici,persone,"lavori maschili",viabilità}
4071	{"edifici religiosi",trento,cavedago,"giochi e sport",edifici,persone,"lavori maschili",viabilità}
4073	{"edifici religiosi",bedolè,trento,cavedago,"giochi e sport",montagne,edifici,persone,"lavori maschili",viabilità}
333	{"edifici religiosi","funzioni religiose",spormaggiore,religiosi,andalo,montagne,edifici,persone,toscana}
752	{"edifici religiosi","funzioni religiose",spormaggiore,religiosi,andalo,montagne,edifici,persone,toscana}
343	{"edifici religiosi","funzioni religiose",spormaggiore,religiosi,andalo,montagne,edifici,persone}
3201	{"edifici religiosi","funzioni religiose",riva,cavedago,religiosi,edifici,persone,dolens}
3199	{"edifici religiosi","funzioni religiose",riva,cavedago,religiosi,edifici,persone,abbigliamento,dolens}
1653	{"edifici religiosi","funzioni religiose",riva,cavedago,religiosi,edifici,persone,abbigliamento,istruzione,dolens}
2648	{"edifici religiosi",uomini,militari,feste,cavedago,religiosi,edifici,persone}
1552	{"edifici religiosi","funzioni religiose",drena,religiosi,edifici,persone,"servizi pubblici"}
1923	{"edifici religiosi",montagne,edifici}
1848	{"edifici religiosi",cavedago,edifici}
1849	{"edifici religiosi",cavedago,montagne,edifici,viabilità}
1847	{"edifici religiosi",cavedago,edifici,"mezzi di trasporto",viabilità}
1844	{"edifici religiosi",cavedago,edifici}
2811	{"edifici religiosi",edifici}
3627	{"edifici religiosi",turismo,montagne,edifici,"servizi pubblici"}
3729	{"edifici religiosi",animali,fai,montagne,edifici,allevamento,viabilità}
3622	{"edifici religiosi",edifici,alberghi}
3167	{"edifici religiosi",sanità,edifici,persone}
1489	{"edifici religiosi","funzioni religiose",religiosi,edifici,persone}
3713	{"edifici religiosi",uomini,militari,edifici,bambini}
3752	{"edifici religiosi",uomini,militari,fai,paganella,montagne,edifici,alberghi,persone,bambini}
4513	{"edifici religiosi",uomini,spormaggiore,militari,trento,edifici,persone,mezzolombardo,mestieri,"lavori maschili"}
2916	{"edifici religiosi",religiosi,andalo,edifici,persone,alimentazione,viabilità}
1035	{"giochi e sport",sci}
1008	{"edifici religiosi",tirol,uomini,militari,feste,turismo,edifici,persone,mezolombardo}
696	{"edifici religiosi",edifici}
1966	{"edifici religiosi",edifici}
1965	{"edifici religiosi",edifici}
1963	{"edifici religiosi",edifici}
1863	{"edifici religiosi",turismo,edifici}
1671	{"edifici religiosi","funzioni religiose",edifici}
1968	{"edifici religiosi",turismo,edifici,viabilità}
1964	{"edifici religiosi",edifici}
2516	{"edifici religiosi",boschi,turismo,paganella,montagne,edifici,istruzione}
1967	{"edifici religiosi",montagne,edifici}
2229	{"edifici religiosi","lavori femminili","giochi e sport",montagne,edifici,persone,toscana,bambini,istruzione}
3657	{"edifici religiosi",edifici,"mezzi di trasporto",viabilità}
1465	{"edifici religiosi",turismo,andalo,montagne,edifici}
3754	{"funzioni religiose","edifici religiosi","lavori femminili",edifici,persone}
2404	{"edifici religiosi",uomini,militari,"lavori femminili",montagne,edifici,persone,bambini,istruzione}
3596	{"edifici religiosi",boschi,montagne,edifici,alberghi}
944	{"edifici religiosi",feste,edifici,alberghi,viabilità}
1617	{"edifici religiosi","lavori femminili",religiosi,montagne,edifici,persone,bambini,istruzione}
1814	{"giochi e sport",montagne,sci}
2231	{"edifici religiosi","lavori femminili",religiosi,montagne,edifici,persone,bambini,istruzione}
1890	{"edifici religiosi",montagne,edifici,alberghi}
649	{"edifici religiosi",andalo,edifici}
329	{"edifici religiosi",sanità,turismo,andalo,montagne,edifici,persone,"servizi pubblici",viabilità}
2773	{cavedago,"giochi e sport",montagne,persone,sci}
401	{"edifici religiosi",uomini,militari,religiosi,montagne,edifici,persone,"servizi pubblici"}
383	{"edifici religiosi",uomini,militari,religiosi,montagne,edifici,persone,"servizi pubblici"}
2592	{"edifici religiosi",turismo,andalo,montagne,"giochi e sport",edifici,alberghi,"servizi pubblici"}
1673	{"edifici religiosi","funzioni religiose",edifici,persone}
2124	{"edifici religiosi",cavedago,andalo,montagne,edifici,toscana,istruzione,viabilità}
695	{"edifici religiosi",animali,uomini,militari,edifici,allevamento,persone,istruzione}
2914	{"edifici religiosi",religiosi,andalo,edifici,persone,alimentazione}
3680	{"edifici religiosi",coscritti,uomini,militari,feste,edifici,persone,bambini,istruzione}
1026	{"edifici religiosi",spormaggiore,fontane,trento,religiosi,edifici,persone,austria,istruzione}
151	{"edifici religiosi",spormaggiore,fontane,trento,religiosi,montagne,edifici,austria,persone,istruzione}
406	{uomini,militari,boschi,africa,persone,alimentazione,"servizi pubblici",mestieri,"lavori maschili"}
3313	{uomini,militari,boschi,africa,persone,alimentazione,"servizi pubblici",mestieri,"lavori maschili"}
393	{uomini,militari,boschi,africa,persone,alimentazione,"servizi pubblici",mestieri,"lavori maschili"}
385	{uomini,militari,boschi,africa,persone,alimentazione,"servizi pubblici",mestieri,"lavori maschili"}
4413	{spormaggiore,bambini,istruzione}
2212	{"funzioni religiose",feste,edifici,alberghi,bambini,istruzione}
913	{"funzioni religiose","edifici religiosi",edifici,persone,abbigliamento,bambini,istruzione}
894	{"funzioni religiose","edifici religiosi",edifici,persone,abbigliamento,bambini,istruzione}
2213	{"funzioni religiose","edifici religiosi",edifici,persone,abbigliamento,bambini,istruzione}
3762	{"giochi e sport",sci}
659	{turismo,agricoltura,"giochi e sport",sci}
658	{agricoltura,turismo,"giochi e sport",sci}
670	{"giochi e sport",montagne,edifici,sci}
711	{montagne,"giochi e sport",edifici,sci}
868	{agricoltura,turismo,"giochi e sport",paganella,sci}
2513	{boschi,turismo,agricoltura,"giochi e sport",montagne,sci}
1069	{boschi,"giochi e sport",sci,"mezzi di trasporto"}
1068	{boschi,"giochi e sport",sci,"mezzi di trasporto"}
2507	{"giochi e sport",montagne,edifici,sci,"mezzi di trasporto"}
1232	{"giochi e sport",edifici,sci,viabilità,molveno}
2689	{"giochi e sport",sci,viabilità}
2627	{"giochi e sport",sci,viabilità,molveno}
1175	{uomini,fai,"giochi e sport",montagne,sci,viabilità}
1125	{boschi,"giochi e sport",montagne,sci,viabilità,molveno}
1107	{agricoltura,"giochi e sport",montagne,sci,viabilità,molveno}
1130	{turismo,"giochi e sport",montagne,edifici,sci,viabilità}
1174	{uomini,fai,"giochi e sport",montagne,sci,viabilità}
2653	{andalo,"giochi e sport",montagne,sci,viabilità,molveno}
2612	{"giochi e sport",montagne,sci,viabilità,molveno}
4546	{"giochi e sport",sci,viabilità}
4544	{"giochi e sport",sci,viabilità}
4180	{spormaggiore,"giochi e sport",sci,valle,viabilità}
221	{belfort,spormaggiore,cavedago,"giochi e sport",paganella,edifici,persone,bambini,sci,viabilità}
2687	{"edifici religiosi","giochi e sport",edifici,sci,viabilità,molveno}
1011	{agricoltura,"giochi e sport",persone,sci}
3334	{"giochi e sport",sci,"mezzi di trasporto"}
3910	{"giochi e sport",sci,"mezzi di trasporto"}
3526	{turismo,"giochi e sport",paganella,sci,"mezzi di trasporto"}
3528	{turismo,"giochi e sport",paganella,sci,"mezzi di trasporto"}
847	{fai,turismo,andalo,"giochi e sport",paganella,montagne,edifici,sci,"mezzi di trasporto",valle,molveno}
1817	{fai,"giochi e sport",paganella,montagne,edifici,sci,"mezzi di trasporto",valle}
1099	{"giochi e sport",paganella,montagne,edifici,lavis,sci,"mezzi di trasporto",valle}
3122	{"giochi e sport",persone,sci,"mezzi di trasporto"}
1826	{fai,"giochi e sport",paganella,montagne,edifici,sci,"mezzi di trasporto",valle}
3833	{boschi,turismo,"giochi e sport",paganella,edifici,sci,"mezzi di trasporto"}
3831	{boschi,turismo,"giochi e sport",paganella,edifici,sci,"mezzi di trasporto"}
3834	{boschi,turismo,"giochi e sport",paganella,edifici,sci,"mezzi di trasporto"}
3487	{turismo,"giochi e sport",montagne,paganella,sci,"mezzi di trasporto"}
3696	{trento,turismo,montagne,"giochi e sport",edifici,persone,sci,"mezzi di trasporto",valle}
3842	{boschi,turismo,"giochi e sport",paganella,sci,"mezzi di trasporto"}
3774	{turismo,"giochi e sport",montagne,sci,"servizi pubblici","mezzi di trasporto"}
3841	{boschi,turismo,"giochi e sport",paganella,sci,"mezzi di trasporto"}
3832	{boschi,turismo,"giochi e sport",paganella,edifici,sci,"mezzi di trasporto"}
3708	{boschi,"giochi e sport",sci,"mezzi di trasporto"}
3705	{fai,boschi,"giochi e sport",montagne,edifici,persone,sci,"mezzi di trasporto",valle}
3864	{boschi,turismo,"giochi e sport",montagne,sci,"mezzi di trasporto"}
3862	{boschi,turismo,"giochi e sport",montagne,sci,"mezzi di trasporto"}
1417	{uomini,militari,persone,bambini}
3512	{boschi,turismo,"giochi e sport",sci,"mezzi di trasporto"}
3511	{boschi,turismo,"giochi e sport",sci,"mezzi di trasporto"}
3707	{boschi,turismo,"giochi e sport",paganella,edifici,sci,"mezzi di trasporto",valle}
3244	{"edifici religiosi",fai,boschi,turismo,"giochi e sport",paganella,montagne,edifici,sci,"mezzi di trasporto",valle}
873	{turismo,"giochi e sport",montagne,paganella,sci,"mezzi di trasporto",alpinismo,valle}
2524	{turismo,"giochi e sport",montagne,edifici,alberghi,sci,"servizi pubblici"}
1132	{"giochi e sport",edifici,alberghi,sci,viabilità,molveno}
848	{fai,turismo,andalo,"giochi e sport",montagne,paganella,sci,"mezzi di trasporto"}
2508	{turismo,andalo,"giochi e sport",edifici,sci,"mezzi di trasporto"}
2982	{andalo,"giochi e sport",sci,"mezzi di trasporto"}
2987	{"giochi e sport",sci,"mezzi di trasporto"}
2615	{"giochi e sport",persone,sci,"mezzi di trasporto",molveno}
2836	{"giochi e sport",paganella,sci,"mezzi di trasporto",istruzione}
2976	{"giochi e sport",sci,"mezzi di trasporto"}
2838	{"giochi e sport",paganella,persone,sci,"mezzi di trasporto",istruzione}
2973	{andalo,"giochi e sport",montagne,sci,"mezzi di trasporto"}
3672	{"giochi e sport",sci,"mezzi di trasporto"}
3674	{"giochi e sport",sci,"mezzi di trasporto"}
2981	{andalo,"giochi e sport",sci,"mezzi di trasporto"}
3670	{"giochi e sport",sci,"mezzi di trasporto"}
1503	{"giochi e sport",persone,sci,"mezzi di trasporto"}
819	{"giochi e sport",paganella,montagne,sci}
1081	{andalo,"giochi e sport",montagne,edifici,sci,valle}
2990	{andalo,"giochi e sport",edifici,sci}
989	{"giochi e sport",montagne,sci}
1822	{montagne,"giochi e sport",edifici,sci}
1839	{canton,"giochi e sport",montagne,edifici,strumenti,sci,viabilità}
2578	{"giochi e sport",sci}
1732	{boschi,"giochi e sport",montagne,sci}
982	{"giochi e sport",montagne,edifici,alberghi,sci}
1074	{"funzioni religiose",senales,feste,"giochi e sport",montagne,edifici,persone,sci,istruzione}
1075	{"funzioni religiose",senales,feste,"giochi e sport",montagne,persone,sci,istruzione}
1274	{montagne,"giochi e sport",edifici,persone,sci,viabilità}
1546	{animali,"caccia e pesca",montagne,"giochi e sport",edifici,persone,sci,viabilità}
1539	{cavedago,montagne,"giochi e sport",edifici,sci}
540	{turismo,andalo,"giochi e sport",montagne,edifici,alberghi,persone,sci,"mezzi di trasporto"}
1080	{andalo,"giochi e sport",montagne,edifici,alberghi,sci,"servizi pubblici",valle}
2908	{boschi,"giochi e sport",montagne,edifici,sci}
2946	{agricoltura,"giochi e sport",montagne,edifici,persone,sci,"mezzi di trasporto"}
2894	{"giochi e sport",montagne,paganella,sci}
654	{laghet,andalo,"giochi e sport",montagne,edifici,alberghi,sci,"servizi pubblici","mezzi di trasporto",valle}
703	{"giochi e sport",montagne,edifici,sci}
1740	{turismo,andalo,"giochi e sport",paganella,montagne,edifici,persone,alberghi,sci,"servizi pubblici",istruzione}
1729	{turismo,andalo,"giochi e sport",montagne,paganella,edifici,persone,alberghi,sci,"servizi pubblici",istruzione}
1747	{turismo,andalo,"giochi e sport",paganella,montagne,edifici,persone,alberghi,sci,"servizi pubblici",istruzione}
2521	{turismo,andalo,"giochi e sport",montagne,edifici,persone,alberghi,sci,"servizi pubblici",istruzione}
2126	{"edifici religiosi",andalo,"giochi e sport",montagne,edifici,persone,sci,"servizi pubblici",istruzione}
2522	{turismo,andalo,"giochi e sport",montagne,edifici,sci,istruzione}
1892	{"edifici religiosi",andalo,"giochi e sport",montagne,edifici,persone,alberghi,sci,"servizi pubblici",istruzione}
584	{sanità,andalo,"giochi e sport",paganella,montagne,edifici,persone,alberghi,sci,"mezzi di trasporto",istruzione}
827	{animali,sanità,andalo,montagne,"giochi e sport",edifici,allevamento,persone,sci,"servizi pubblici",istruzione}
828	{animali,sanità,andalo,montagne,"giochi e sport",edifici,allevamento,persone,sci,"servizi pubblici",istruzione}
1958	{animali,sanità,andalo,montagne,"giochi e sport",edifici,allevamento,persone,sci,"servizi pubblici",istruzione}
708	{uomini,militari,"giochi e sport",montagne,edifici,persone,sci}
889	{uomini,militari,agricoltura,turismo,"giochi e sport",montagne,strumenti,sci}
869	{uomini,cles,militari,dermulo,turismo,agricoltura,"giochi e sport",paganella,montagne,strumenti,sci}
2384	{uomini,militari,feste,"giochi e sport",montagne,edifici,persone,"servizi pubblici",sci,"mezzi di trasporto"}
2284	{uomini,militari,"giochi e sport",persone,sci}
2287	{uomini,militari,"giochi e sport",persone,sci}
1134	{uomini,militari,"giochi e sport",edifici,alberghi,sci,emigrazione,donne,viabilità}
3120	{uomini,militari,"giochi e sport",edifici,alberghi,sci,"mezzi di trasporto"}
1816	{uomini,militari,andalo,montagne,"giochi e sport",edifici,sci,istruzione}
2888	{uomini,militari,andalo,"giochi e sport",montagne,edifici,sci,istruzione}
2293	{uomini,militari,feste,drena,andalo,"giochi e sport",edifici,persone,sci,istruzione}
2918	{uomini,militari,montagne,"giochi e sport",edifici,alberghi,persone,sci,"servizi pubblici","mezzi di trasporto"}
2799	{sarca,"giochi e sport",montagne,persone,sci,mestieri,viabilità,"lavori maschili"}
3040	{"giochi e sport",sci}
2535	{"edifici religiosi",uomini,militari,sanità,boschi,agricoltura,andalo,"giochi e sport",montagne,edifici,persone,alberghi,toscana,sci,istruzione,"lavori maschili"}
1813	{"edifici religiosi",uomini,militari,senales,desenzano,"giochi e sport",garda,edifici,alberghi,persone,sci,istruzione}
2797	{sarca,"giochi e sport",montagne,persone,sci,mestieri,viabilità,"lavori maschili"}
2798	{sarca,"giochi e sport",montagne,persone,sci,mestieri,"lavori maschili",viabilità}
1104	{turismo,agricoltura,"giochi e sport",montagne,sci,molveno}
877	{turismo,agricoltura,"giochi e sport",sci}
3113	{fai,boschi,"giochi e sport",paganella,persone,sci,"lavori maschili"}
2499	{andalo,"giochi e sport",montagne,edifici,alberghi,persone,sci,"servizi pubblici",istruzione,viabilità}
926	{uomini,militari,cavedago,montagne,"giochi e sport",edifici,persone,sci,"mezzi di trasporto",viabilità}
2974	{oggetti,"giochi e sport",persone,abbigliamento,sci,"mezzi di trasporto"}
2969	{oggetti,"giochi e sport",persone,abbigliamento,sci,"mezzi di trasporto"}
2887	{"edifici religiosi",andalo,"giochi e sport",paganella,montagne,edifici,alberghi,sci,"servizi pubblici","mezzi di trasporto",istruzione}
2889	{"edifici religiosi",feste,sanità,andalo,"giochi e sport",montagne,edifici,persone,alberghi,sci,"servizi pubblici",istruzione}
1466	{"edifici religiosi",andalo,"giochi e sport",montagne,edifici,alberghi,sci,istruzione}
1864	{uomini,militari,boschi,turismo,andalo,"giochi e sport",montagne,edifici,alberghi,persone,sci}
2528	{uomini,militari,boschi,turismo,andalo,"giochi e sport",montagne,edifici,alberghi,persone,sci}
2708	{"giochi e sport",edifici,sci,molveno}
787	{uomini,militari,turismo,andalo,montagne,"giochi e sport",paganella,edifici,alberghi,persone,sci,"lavori maschili"}
2892	{uomini,militari,turismo,andalo,montagne,"giochi e sport",paganella,edifici,alberghi,persone,sci,"lavori maschili"}
2580	{uomini,militari,feste,turismo,andalo,montagne,paganella,"giochi e sport",edifici,alberghi,sci,"servizi pubblici","mezzi di trasporto",priori,"lavori maschili"}
1129	{"edifici religiosi",uomini,militari,turismo,andalo,montagne,"giochi e sport",edifici,alberghi,persone,sci,"servizi pubblici","mezzi di trasporto","lavori maschili",viabilità}
1870	{"edifici religiosi",uomini,militari,turismo,andalo,montagne,"giochi e sport",edifici,alberghi,persone,sci,"servizi pubblici","mezzi di trasporto","lavori maschili",viabilità}
1961	{"edifici religiosi",uomini,militari,turismo,andalo,"giochi e sport",montagne,edifici,alberghi,persone,sci,"servizi pubblici","mezzi di trasporto","lavori maschili",viabilità}
2853	{"edifici religiosi",uomini,militari,turismo,andalo,montagne,"giochi e sport",edifici,alberghi,persone,sci,"servizi pubblici","mezzi di trasporto","lavori maschili",viabilità}
2110	{rifugi,boschi,"giochi e sport",edifici,persone,sci,"mezzi di trasporto",viabilità}
992	{rifugi,turismo,"giochi e sport",paganella,montagne,edifici,sci}
3229	{"giochi e sport",persone,sci}
4203	{"giochi e sport",persone,sci}
1820	{"giochi e sport",montagne,persone,sci}
1828	{rifugi,turismo,"giochi e sport",montagne,edifici,sci}
2896	{rifugi,turismo,"giochi e sport",montagne,edifici,sci}
833	{animali,"caccia e pesca",turismo,"giochi e sport",montagne,edifici,sci,"mezzi di trasporto",molveno}
1112	{"edifici religiosi","giochi e sport",edifici,sci,viabilità,molveno}
1991	{"edifici religiosi",bedolè,"giochi e sport",montagne,edifici,sci}
1836	{"edifici religiosi",bedolè,"giochi e sport",montagne,edifici,sci}
3837	{"edifici religiosi",boschi,"giochi e sport",montagne,edifici,alberghi,sci,viabilità}
3610	{"edifici religiosi",cavedago,"giochi e sport",montagne,edifici,sci,valle,viabilità}
3737	{"edifici religiosi",cavedago,"giochi e sport",montagne,edifici,sci,valle,viabilità}
863	{"edifici religiosi",castrozza,agricoltura,turismo,"giochi e sport",montagne,edifici,sci}
864	{"edifici religiosi",castrozza,agricoltura,turismo,"giochi e sport",edifici,sci}
862	{"edifici religiosi",castrozza,turismo,"giochi e sport",montagne,edifici,sci}
1736	{"edifici religiosi","giochi e sport",montagne,edifici,sci}
2510	{"edifici religiosi",turismo,andalo,"giochi e sport",montagne,edifici,alberghi,sci}
588	{turismo,"giochi e sport",montagne,persone,bambini,sci,istruzione}
2716	{"giochi e sport",persone,sci,molveno}
1824	{"edifici religiosi",andalo,"giochi e sport",paganella,montagne,edifici,persone,alberghi,sci,istruzione}
1827	{rifugi,"giochi e sport",montagne,edifici,persone,sci}
1818	{"giochi e sport",montagne,persone,sci}
1488	{"giochi e sport",persone,sci}
4293	{persone,bambini,istruzione}
3439	{persone,bambini,istruzione}
3132	{fai,persone,bambini,istruzione,ori}
2026	{"lavori femminili",cavedago,edifici,persone,bambini,istruzione,donne}
328	{andalo,montagne,persone,bambini,istruzione}
2458	{andalo,montagne,persone,bambini,istruzione}
553	{"lavori femminili",cavedago,persone,bambini,istruzione}
2488	{cavedago,persone,bambini,istruzione,molveno}
2429	{"lavori femminili",agricoltura,cavedago,persone,alimentazione,agricoltura,bambini,istruzione}
2788	{"caccia e pesca",agricoltura,cavedago,montagne,edifici,alimentazione,agricoltura}
1384	{"giochi e sport",montagne,sci,"mezzi di trasporto",molveno}
1364	{"giochi e sport",montagne,sci,"mezzi di trasporto"}
1386	{"giochi e sport",sci,"mezzi di trasporto"}
1355	{rifugi,boschi,"giochi e sport",montagne,edifici,sci,"mezzi di trasporto"}
1385	{agricoltura,"giochi e sport",montagne,edifici,sci,"mezzi di trasporto",molveno}
1359	{ischia,turismo,"giochi e sport",edifici,sci,"mezzi di trasporto",viabilità}
2718	{"giochi e sport",montagne,sci,"mezzi di trasporto"}
612	{"edifici religiosi",andalo,"giochi e sport",montagne,edifici,alberghi,sci,"mezzi di trasporto"}
2663	{"edifici religiosi",andalo,"giochi e sport",montagne,edifici,alberghi,sci,"mezzi di trasporto"}
2672	{"giochi e sport",montagne,edifici,sci,"mezzi di trasporto",molveno}
2710	{"giochi e sport",sci,"mezzi di trasporto"}
831	{turismo,montagne,strumenti,valle,"lavori maschili",molveno}
4182	{strumenti,persone,"lavori maschili"}
17	{uomini,militari,rifugi,turismo,montagne,edifici,strumenti,alberghi,valle,"lavori maschili"}
18	{edifici,valle,"lavori maschili"}
1021	{paganella,edifici,"lavori maschili"}
1025	{paganella,edifici,"lavori maschili"}
766	{uomini,militari,persone}
1024	{boschi,paganella,edifici,"lavori maschili"}
2695	{montagne,edifici,"lavori maschili"}
1020	{boschi,paganella,edifici,"lavori maschili"}
2545	{edifici,"lavori maschili",molveno}
1034	{boschi,edifici,"servizi pubblici","lavori maschili"}
1288	{edifici,persone,"servizi pubblici",donne,"lavori maschili",molveno}
2609	{edifici,"lavori maschili",molveno}
2602	{turismo,montagne,edifici,"lavori maschili"}
1043	{"edifici religiosi",paganella,edifici,toscana,"lavori maschili"}
613	{"edifici religiosi",turismo,andalo,montagne,edifici,persone,"servizi pubblici","lavori maschili"}
783	{"edifici religiosi",turismo,andalo,montagne,edifici,persone,"servizi pubblici","lavori maschili"}
1825	{paganella,montagne,edifici,"servizi pubblici","lavori maschili"}
2667	{"edifici religiosi",boschi,turismo,paganella,montagne,edifici,persone,"lavori maschili"}
1022	{boschi,montagne,paganella,edifici,alberghi,toscana,istruzione,"lavori maschili"}
777	{montagne,edifici,alberghi,istruzione,"lavori maschili"}
1954	{montagne,edifici,alberghi,istruzione,"lavori maschili"}
2588	{montagne,edifici,alberghi,istruzione,"lavori maschili"}
2897	{montagne,edifici,alberghi,istruzione,"lavori maschili"}
1962	{"edifici religiosi",boschi,turismo,andalo,montagne,edifici,persone,"servizi pubblici",istruzione,"lavori maschili"}
1122	{"edifici religiosi",boschi,turismo,andalo,montagne,edifici,persone,"servizi pubblici","lavori maschili"}
2525	{turismo,andalo,montagne,paganella,edifici,alberghi,"servizi pubblici","lavori maschili"}
1023	{sanità,paganella,edifici,persone,toscana,"lavori maschili"}
1143	{"edifici religiosi",sanità,turismo,andalo,edifici,persone,istruzione,"lavori maschili"}
305	{sanità,montagne,edifici,persone,alberghi,"servizi pubblici","lavori maschili"}
1688	{sanità,montagne,edifici,persone,alberghi,"servizi pubblici","lavori maschili"}
1036	{sanità,turismo,montagne,paganella,edifici,persone,"servizi pubblici","lavori maschili"}
1690	{sanità,montagne,edifici,alberghi,persone,"servizi pubblici","lavori maschili"}
1084	{sanità,turismo,montagne,edifici,persone,alberghi,"lavori maschili"}
2509	{sanità,turismo,montagne,edifici,persone,alberghi,"lavori maschili"}
544	{"edifici religiosi",feste,sanità,turismo,andalo,montagne,"giochi e sport",edifici,persone,alberghi,istruzione,"lavori maschili"}
1735	{sanità,andalo,paganella,montagne,edifici,persone,alberghi,"servizi pubblici",istruzione,"lavori maschili"}
1953	{"edifici religiosi",sanità,andalo,montagne,"giochi e sport",paganella,edifici,alberghi,persone,"servizi pubblici","lavori maschili"}
660	{sanità,turismo,montagne,edifici,persone,"lavori maschili"}
2536	{uomini,militari,sanità,turismo,andalo,"giochi e sport",montagne,paganella,edifici,persone,alberghi,istruzione,"lavori maschili"}
1668	{sanità,agricoltura,paganella,edifici,strumenti,persone,bambini,"lavori maschili"}
1666	{sanità,agricoltura,paganella,edifici,strumenti,persone,bambini,"lavori maschili"}
366	{"edifici religiosi",turismo,andalo,montagne,"giochi e sport",edifici,persone,alberghi,alimentazione,"servizi pubblici",istruzione,"lavori maschili"}
1868	{"edifici religiosi",turismo,andalo,montagne,"giochi e sport",edifici,persone,alberghi,alimentazione,"servizi pubblici",istruzione,"lavori maschili"}
610	{andalo,montagne,edifici,alberghi,persone,"servizi pubblici","lavori maschili"}
335	{"edifici religiosi",boschi,"lavori femminili",andalo,montagne,edifici,persone,alimentazione,"servizi pubblici",mestieri,"lavori maschili"}
990	{"edifici religiosi",boschi,"lavori femminili",montagne,edifici,persone,alimentazione,"servizi pubblici",mestieri,"lavori maschili"}
474	{agricoltura,persone,alimentazione,istruzione}
300	{andalo,"giochi e sport",montagne,edifici,sci,"mezzi di trasporto",istruzione,"lavori maschili"}
794	{"edifici religiosi",andalo,"giochi e sport",montagne,edifici,alberghi,sci,"servizi pubblici","mezzi di trasporto",istruzione,"lavori maschili"}
954	{feste,andalo,"giochi e sport",paganella,montagne,edifici,sci,"mezzi di trasporto",istruzione,"lavori maschili"}
993	{feste,andalo,"giochi e sport",paganella,montagne,edifici,sci,"mezzi di trasporto",istruzione,"lavori maschili"}
977	{feste,andalo,"giochi e sport",montagne,paganella,edifici,sci,"mezzi di trasporto",istruzione,"lavori maschili"}
818	{animali,andalo,montagne,"giochi e sport",paganella,edifici,allevamento,sci,"mezzi di trasporto",istruzione,"lavori maschili"}
1015	{sanità,andalo,"giochi e sport",montagne,edifici,persone,sci,"servizi pubblici","mezzi di trasporto",istruzione,"lavori maschili"}
1120	{sanità,turismo,andalo,"giochi e sport",montagne,edifici,persone,alberghi,sci,"servizi pubblici","lavori maschili"}
606	{sanità,andalo,montagne,"giochi e sport",edifici,persone,alberghi,sci,"mezzi di trasporto","lavori maschili",viabilità}
1227	{edifici,"servizi pubblici","lavori maschili",molveno}
749	{animali,allevamento,alimentazione}
3660	{arsié,animali,trento,"giochi e sport",montagne,edifici,allevamento,alberghi,alimentazione,"servizi pubblici"}
3661	{animali,trento,montagne,"giochi e sport",edifici,allevamento,alberghi,alimentazione,"servizi pubblici"}
978	{andalo,"giochi e sport",montagne,paganella,edifici,alberghi,sci,"mezzi di trasporto"}
3488	{"giochi e sport",bambini,sci,"mezzi di trasporto"}
3065	{"giochi e sport",sci,"mezzi di trasporto"}
3061	{"giochi e sport",sci,"mezzi di trasporto"}
3063	{"giochi e sport",sci,"mezzi di trasporto"}
1821	{"giochi e sport",montagne,sci,"mezzi di trasporto"}
1815	{andalo,"giochi e sport",sci,"mezzi di trasporto"}
3475	{"giochi e sport",sci,"mezzi di trasporto"}
2514	{boschi,"caccia e pesca",turismo,andalo,"giochi e sport",montagne,paganella,edifici,persone,sci,"mezzi di trasporto"}
1812	{laghet,"giochi e sport",montagne,persone,sci,"mezzi di trasporto"}
2520	{laghet,"giochi e sport",montagne,persone,sci,"mezzi di trasporto"}
2515	{agricoltura,turismo,"giochi e sport",montagne,sci,"mezzi di trasporto",istruzione}
4602	{"giochi e sport",sci,"mezzi di trasporto"}
1898	{"giochi e sport",persone,sci,"mezzi di trasporto"}
554	{uomini,militari,rocchetta,"giochi e sport",sci,"mezzi di trasporto",viabilità}
555	{uomini,militari,rocchetta,"giochi e sport",sci,"mezzi di trasporto",viabilità}
3214	{"giochi e sport",bambini,sci}
3211	{"giochi e sport",montagne,bambini,sci}
3802	{"giochi e sport",montagne,persone,sci}
2956	{uomini,militari,"giochi e sport",sci}
1196	{uomini,militari,persone}
4204	{uomini,militari,persone}
767	{uomini,militari,persone}
1198	{uomini,militari,persone}
1197	{uomini,militari,persone}
1240	{uomini,militari,persone}
1217	{uomini,militari,"lavori femminili","giochi e sport",persone}
2089	{uomini,militari,andalo,persone}
2098	{uomini,militari,persone}
1920	{uomini,militari,persone}
4500	{uomini,militari,persone}
4503	{uomini,militari,persone}
2004	{uomini,militari,persone}
3717	{uomini,militari,persone}
407	{uomini,militari,persone}
2423	{uomini,militari,persone}
2424	{uomini,militari,persone}
2099	{uomini,militari,persone}
751	{uomini,militari,turismo,persone}
2459	{uomini,militari,persone}
1720	{uomini,militari,persone}
2003	{(anche,uomini,militari,persone}
2937	{uomini,militari,persone}
2352	{uomini,innsbruck,militari,turismo,persone}
3823	{uomini,militari,persone}
2096	{uomini,militari,persone}
2354	{uomini,innsbruck,militari,turismo,persone}
1996	{uomini,militari,andalo,persone}
2090	{bressanone,uomini,militari,persone}
2808	{uomini,militari,persone,bambini}
2805	{uomini,militari,cavedago,strumenti,persone,viabilità,molveno}
3196	{"funzioni religiose",uomini,militari,agricoltura,religiosi,paganella,persone}
3710	{uomini,militari,persone,istruzione}
1998	{"funzioni religiose",uomini,militari,feste,persone}
3797	{uomini,militari,sanità,edifici,persone,"servizi pubblici"}
4448	{uomini,militari,persone}
1204	{uomini,militari,persone}
1194	{uomini,militari,persone}
2813	{uomini,militari,persone}
1571	{uomini,militari,persone}
706	{uomini,militari,cavedago,edifici,persone}
1613	{uomini,trento,militari,persone,istruzione}
3357	{uomini,militari,persone}
2766	{uomini,militari,boschi,persone}
3366	{uomini,militari,cavedago,persone}
4281	{uomini,militari,persone}
4280	{uomini,militari,persone}
2246	{uomini,militari,cavedago,persone,emigrazione}
3994	{uomini,militari,cavedago,persone,emigrazione}
2303	{uomini,militari,cavedago,persone,emigrazione}
2245	{uomini,militari,cavedago,persone,emigrazione}
3993	{uomini,militari,cavedago,persone,emigrazione}
579	{"funzioni religiose",uomini,militari,persone,bambini,istruzione}
279	{uomini,militari,cavedago,strumenti,persone,abbigliamento,"lavori maschili"}
3699	{"funzioni religiose",uomini,militari,feste,cavedago,montagne,persone}
157	{uomini,militari,persone}
1200	{uomini,militari,persone}
4498	{uomini,militari,persone}
1199	{uomini,militari,persone}
1190	{uomini,militari,persone,bambini,istruzione}
263	{uomini,militari,persone,bambini,istruzione}
1028	{innsbruck,uomini,spormaggiore,militari,agricoltura,turismo,edifici,persone,vienna,mestieri}
2447	{feste,persone,abbigliamento,bambini,donne}
842	{"edifici religiosi","funzioni religiose",cavedago,religiosi,edifici,persone,alberghi,abbigliamento,istruzione}
2243	{andalo,edifici,persone,toscana,mestieri,"lavori maschili"}
2750	{andalo,edifici,persone,toscana,mestieri,"lavori maschili"}
4529	{persone,mestieri,"lavori maschili"}
2809	{cavedago,persone,mestieri,"lavori maschili"}
4481	{persone,mestieri,"lavori maschili"}
3442	{persone,mestieri,"lavori maschili"}
3152	{feste,persone}
4597	{feste,persone}
645	{feste,buonconsiglio,edifici,persone}
1797	{feste,persone,bambini}
3174	{"funzioni religiose",feste,persone}
1795	{"funzioni religiose",feste,persone}
1800	{"funzioni religiose",feste,persone}
558	{"funzioni religiose",feste,persone,donne}
4461	{"funzioni religiose",feste,persone}
3806	{"funzioni religiose",feste,persone,donne}
3936	{"funzioni religiose",trento,feste,persone}
4030	{"edifici religiosi",trento,feste,cavedago,edifici,persone}
4056	{"edifici religiosi",trento,feste,cavedago,edifici,persone}
4063	{"edifici religiosi",trento,feste,cavedago,edifici,persone}
4061	{"edifici religiosi",trento,feste,cavedago,edifici,persone,bambini}
4076	{"edifici religiosi",trento,feste,cavedago,edifici,persone}
4088	{"funzioni religiose","edifici religiosi",feste,edifici,persone}
4038	{"funzioni religiose","edifici religiosi",feste,edifici,persone}
4034	{"funzioni religiose","edifici religiosi",feste,edifici,persone}
4087	{"funzioni religiose","edifici religiosi",feste,edifici,persone}
4089	{"funzioni religiose","edifici religiosi",feste,edifici,persone}
4086	{"funzioni religiose","edifici religiosi",feste,edifici,persone}
4085	{"funzioni religiose","edifici religiosi",feste,edifici,persone}
4046	{"edifici religiosi",trento,feste,cavedago,religiosi,edifici,persone}
4050	{"edifici religiosi",trento,feste,cavedago,religiosi,edifici,persone}
4053	{"edifici religiosi",trento,feste,cavedago,religiosi,edifici,persone}
4032	{"edifici religiosi",trento,feste,cavedago,religiosi,edifici,persone}
4044	{"edifici religiosi",trento,feste,cavedago,religiosi,edifici,persone}
4045	{"edifici religiosi",trento,feste,cavedago,religiosi,edifici,persone}
4031	{"edifici religiosi",trento,feste,cavedago,religiosi,edifici,persone}
4043	{"edifici religiosi",trento,feste,cavedago,religiosi,edifici,persone}
4035	{"funzioni religiose","edifici religiosi",feste,religiosi,edifici,persone}
4100	{"funzioni religiose","edifici religiosi",feste,cavedago,religiosi,edifici,persone}
4042	{"funzioni religiose","edifici religiosi",feste,cavedago,religiosi,edifici,persone}
4039	{"funzioni religiose","edifici religiosi",feste,cavedago,religiosi,edifici,persone}
4102	{"funzioni religiose","edifici religiosi",feste,edifici,persone,istruzione}
4101	{"funzioni religiose","edifici religiosi",feste,edifici,persone,bambini}
4069	{"edifici religiosi",bedolè,trento,feste,cavedago,"giochi e sport",montagne,edifici,persone,bambini,"lavori maschili",viabilità}
4070	{"edifici religiosi",bedolè,trento,feste,cavedago,"giochi e sport",montagne,edifici,persone,"lavori maschili",viabilità}
4090	{"edifici religiosi",bedolè,trento,feste,cavedago,"giochi e sport",montagne,edifici,persone,"lavori maschili",viabilità}
4091	{"edifici religiosi",bedolè,trento,feste,cavedago,"giochi e sport",montagne,edifici,persone,"lavori maschili",viabilità}
4092	{"edifici religiosi",bedolè,trento,feste,cavedago,"giochi e sport",montagne,edifici,persone,"lavori maschili",viabilità}
4093	{"edifici religiosi",bedolè,trento,feste,cavedago,"giochi e sport",montagne,edifici,persone,"lavori maschili",viabilità}
1672	{"edifici religiosi","funzioni religiose",andalo,edifici}
4094	{"edifici religiosi",bedolè,trento,feste,cavedago,"giochi e sport",montagne,edifici,persone,"lavori maschili",viabilità}
2450	{"edifici religiosi","funzioni religiose",feste,boschi,"lavori femminili",montagne,edifici,persone}
4029	{feste,"lavori femminili",cavedago,"giochi e sport",edifici,persone,bambini}
1708	{"funzioni religiose","edifici religiosi",feste,"lavori femminili",edifici,persone}
4078	{"edifici religiosi",trento,feste,cavedago,edifici,persone}
4079	{"edifici religiosi",trento,feste,cavedago,edifici,persone}
3172	{"edifici religiosi",feste,edifici,persone}
4081	{"edifici religiosi",bedolè,trento,feste,cavedago,montagne,"giochi e sport",edifici,persone,"lavori maschili",viabilità}
4057	{"edifici religiosi",trento,feste,cavedago,edifici,persone}
4059	{"edifici religiosi",trento,feste,"lavori femminili",cavedago,edifici,persone,bambini,viabilità}
363	{edifici,allevamento,"lavori maschili"}
1450	{"edifici religiosi","funzioni religiose",edifici}
1453	{"edifici religiosi","funzioni religiose",edifici}
2898	{"edifici religiosi",feste,edifici}
1447	{"edifici religiosi","funzioni religiose",edifici}
1449	{"edifici religiosi","funzioni religiose",edifici}
1446	{"edifici religiosi","funzioni religiose",edifici}
1452	{"edifici religiosi","funzioni religiose",edifici}
1451	{"edifici religiosi","funzioni religiose",edifici}
296	{"edifici religiosi",uomini,militari,edifici}
4123	{"edifici religiosi",uomini,militari,edifici}
1448	{"edifici religiosi","funzioni religiose",uomini,militari,edifici,istruzione}
3648	{"edifici religiosi","funzioni religiose",coscritti,uomini,"lavori femminili",religiosi,paganella,edifici,persone}
462	{persone,abbigliamento,bambini,istruzione}
4273	{tirolo,"edifici religiosi","funzioni religiose",uomini,militari,feste,boschi,sporo,"giochi e sport",edifici,persone,abbigliamento,alimentazione,bambini}
1205	{persone,bambini,istruzione}
4272	{tirolo,"edifici religiosi","funzioni religiose",uomini,militari,feste,boschi,sporo,"giochi e sport",edifici,persone,abbigliamento,alimentazione,bambini}
4037	{"funzioni religiose","edifici religiosi",feste,"giochi e sport",edifici,persone,istruzione}
927	{"lavori femminili",agricoltura,edifici,strumenti,persone,agricoltura,abbigliamento,alimentazione}
508	{feste,persone,bambini,istruzione}
4599	{belfort,spormaggiore,religiosi,edifici,persone,bambini,emigrazione,istruzione}
4185	{"edifici religiosi",spormaggiore,trento,religiosi,edifici,persone,bambini,emigrazione,istruzione}
3582	{"edifici religiosi",uomini,militari,"lavori femminili",montagne,edifici,strumenti,persone,alberghi,bambini,istruzione,benàco}
324	{religiosi,montagne,edifici,persone,"lavori maschili"}
3080	{fontane,religiosi,edifici,persone}
2383	{feste,boschi,religiosi,lavarone,persone,istruzione,priori}
2714	{feste,boschi,religiosi,lavarone,persone,istruzione,priori}
2131	{uomini,militari,"lavori femminili",religiosi,persone,bambini,toscana,"servizi pubblici",istruzione}
1725	{feste,religiosi,persone,bambini}
3751	{"lavori femminili",religiosi,persone,istruzione}
557	{religiosi,persone,abbigliamento,istruzione}
2767	{religiosi,persone,abbigliamento,istruzione}
2829	{religiosi,persone,abbigliamento,istruzione}
1579	{"edifici religiosi",agricoltura,edifici,alimentazione,agricoltura}
2168	{uomini,militari,cavedago,persone,abbigliamento}
277	{"edifici religiosi",sanità,religiosi,edifici,persone,abbigliamento}
2704	{"edifici religiosi","funzioni religiose",coscritti,uomini,militari,religiosi,edifici,persone,mezzolombardo,abbigliamento}
2709	{"edifici religiosi","funzioni religiose",coscritti,uomini,militari,religiosi,edifici,persone,mezzolombardo,abbigliamento}
2707	{"edifici religiosi","funzioni religiose",coscritti,uomini,militari,religiosi,edifici,persone,mezzolombardo,abbigliamento}
2219	{turismo,edifici,montecatini}
1247	{"edifici religiosi","giochi e sport",edifici,persone}
1245	{"edifici religiosi",cavedago,"giochi e sport",edifici,persone,viabilità}
2670	{"edifici religiosi",riva,cavedago,edifici,persone}
3220	{"edifici religiosi",riva,cavedago,edifici,persone}
3750	{animali,allevamento}
3082	{turismo,strumenti,persone,"mezzi di trasporto","lavori maschili",viabilità}
2227	{animali,uomini,militari,boschi,turismo,andalo,"giochi e sport",strumenti,africa,allevamento,persone,alimentazione,sci,"servizi pubblici","mezzi di trasporto",valle,mestieri,"lavori maschili"}
740	{feste,"giochi e sport",sci,istruzione}
1665	{agricoltura,edifici,strumenti,persone,"mezzi di trasporto"}
2418	{agricoltura,"giochi e sport",strumenti,persone,"mezzi di trasporto",priori}
2425	{agricoltura,cavedago,"giochi e sport",strumenti,persone,"mezzi di trasporto",priori}
3398	{agricoltura,"giochi e sport",strumenti,persone,"mezzi di trasporto",priori}
2256	{"edifici religiosi",agricoltura,montagne,edifici,strumenti,"mezzi di trasporto"}
2481	{agricoltura,cavedago,montagne,edifici,strumenti,persone,"mezzi di trasporto",viabilità}
1050	{"lavori femminili",agricoltura,montagne,edifici,strumenti,persone,"mezzi di trasporto",viabilità}
1054	{bedolè,agricoltura,cavedago,verdura,"giochi e sport",montagne,edifici,strumenti,persone,alimentazione,"mezzi di trasporto",viabilità}
2194	{feste,carnevale,"lavori femminili",agricoltura,"giochi e sport",strumenti,bambini,sci,"mezzi di trasporto"}
2071	{persone,abbigliamento,istruzione}
1582	{boschi,agricoltura,montagne,strumenti,persone,alimentazione,abbigliamento,agricoltura,"mezzi di trasporto",viabilità}
3836	{rocchetta,edifici,mezzolombardo,"mezzi di trasporto",viabilità}
678	{"giochi e sport",sci}
677	{"giochi e sport",sci}
700	{"giochi e sport",sci}
676	{"giochi e sport",sci}
2500	{"giochi e sport",sci}
3238	{uomini,militari,"giochi e sport",paganella,persone,sci}
1479	{religiosi,persone}
3603	{sanità,boschi,"giochi e sport",montagne,edifici,allevamento,persone,sci,"servizi pubblici"}
1480	{boschi,"lavori maschili"}
4642	{boschi,"lavori maschili"}
1927	{uomini,militari,boschi,edifici,persone,bambini,"lavori maschili"}
3780	{uomini,militari,boschi,"giochi e sport",paganella,montagne,edifici,strumenti,alberghi,bambini,sci,"mezzi di trasporto",valle,"lavori maschili"}
3556	{"edifici religiosi",boschi,cavedago,"giochi e sport",montagne,edifici,"lavori maschili",viabilità}
4146	{"edifici religiosi",boschi,cavedago,"giochi e sport",montagne,edifici,"lavori maschili",viabilità}
998	{boschi,"giochi e sport",montagne,sci,"mezzi di trasporto","lavori maschili"}
661	{boschi,"giochi e sport",montagne,edifici,sci,"mezzi di trasporto","lavori maschili"}
975	{boschi,"giochi e sport",montagne,sci,"mezzi di trasporto","lavori maschili"}
586	{"edifici religiosi",fai,rifugi,boschi,roda,turismo,andalo,"giochi e sport",paganella,montagne,edifici,persone,sci,"mezzi di trasporto",valle,"lavori maschili",molveno}
2108	{rifugi,montagne,edifici,alpinismo}
2198	{animali,allevamento,persone}
2208	{animali,agricoltura,allevamento,persone}
2204	{animali,agricoltura,allevamento,persone}
2203	{animali,agricoltura,allevamento,persone}
2205	{animali,agricoltura,allevamento,persone,emigrazione}
2210	{animali,agricoltura,allevamento,persone,emigrazione}
3772	{fai,feste,agricoltura,religiosi,verdura,edifici,persone,alimentazione}
1730	{turismo,"giochi e sport",montagne,sci,"mezzi di trasporto",viabilità}
1731	{"giochi e sport",montagne,sci,"mezzi di trasporto",viabilità}
3203	{uomini,militari,feste,riva,cavedago,persone,abbigliamento}
1733	{"giochi e sport",montagne,paganella,sci,"mezzi di trasporto",viabilità}
562	{religiosi,persone}
578	{"edifici religiosi",religiosi,edifici,persone}
1325	{"funzioni religiose",uomini,militari,religiosi,sporo,persone}
577	{"edifici religiosi",religiosi,edifici,persone}
295	{"edifici religiosi","funzioni religiose",uomini,cavedago,religiosi,edifici,persone,abbigliamento,donne}
4578	{"funzioni religiose",persone,"mezzi di trasporto",viabilità}
1787	{uomini,spormaggiore,militari,persone,"mezzi di trasporto",viabilità}
1027	{persone,abbigliamento}
2732	{persone,abbigliamento,molveno}
2735	{montagne,persone,abbigliamento,molveno}
1558	{belfort,edifici,persone,abbigliamento}
2731	{edifici,persone,abbigliamento,molveno}
2728	{turismo,montagne,persone,abbigliamento,molveno}
2726	{montagne,persone,abbigliamento,molveno}
2729	{edifici,persone,abbigliamento,molveno}
1550	{edifici,persone,abbigliamento,bambini}
2733	{edifici,persone,alberghi,abbigliamento,molveno}
2730	{riva,ischia,edifici,persone,alberghi,abbigliamento,"servizi pubblici",emigrazione,molveno}
2727	{"edifici religiosi",montagne,edifici,persone,abbigliamento,molveno}
2725	{uomini,militari,montagne,persone,abbigliamento,istruzione,molveno}
3543	{cavedago,persone,abbigliamento,emigrazione}
3143	{religiosi,persone,abbigliamento}
3155	{"edifici religiosi",uomini,militari,fai,edifici,persone,abbigliamento,istruzione}
1477	{religiosi,persone,abbigliamento}
1031	{religiosi,persone,abbigliamento}
3178	{"lavori femminili",persone,abbigliamento,bambini,istruzione}
742	{animali,crosare,boschi,turismo,montagne,"giochi e sport",edifici,allevamento,persone,alberghi,abbigliamento,alimentazione,donne}
745	{animali,crosare,boschi,turismo,"giochi e sport",montagne,edifici,allevamento,persone,alberghi,abbigliamento,alimentazione,donne}
1501	{animali,crosare,boschi,turismo,montagne,"giochi e sport",edifici,allevamento,persone,alberghi,abbigliamento,alimentazione,donne}
1625	{animali,crosare,boschi,turismo,montagne,"giochi e sport",edifici,allevamento,persone,alberghi,abbigliamento,alimentazione,donne}
158	{"edifici religiosi",uomini,militari,feste,edifici,persone,abbigliamento,donne,viabilità}
4612	{persone,abbigliamento}
3168	{"edifici religiosi",religiosi,villazzano,edifici,persone,abbigliamento}
273	{uomini,spormaggiore,spor,cavedago,religiosi,edifici,persone,abbigliamento,bambini,istruzione,mestieri,"lavori maschili",viabilità}
814	{uomini,spormaggiore,spor,cavedago,religiosi,edifici,persone,abbigliamento,bambini,istruzione,mestieri,"lavori maschili",viabilità}
2022	{uomini,spormaggiore,spor,cavedago,religiosi,edifici,persone,abbigliamento,bambini,istruzione,mestieri,"lavori maschili",viabilità}
2063	{spormaggiore,uomini,spor,cavedago,religiosi,edifici,persone,abbigliamento,bambini,istruzione,mestieri,"lavori maschili",viabilità}
1101	{montagne,"mezzi di trasporto",viabilità,molveno}
1100	{animali,"caccia e pesca",montagne,"mezzi di trasporto",viabilità}
1102	{montagne,edifici,alberghi,"mezzi di trasporto",viabilità}
1088	{turismo,andalo,"giochi e sport",montagne,edifici,sci,"mezzi di trasporto",viabilità}
880	{"giochi e sport",montagne,edifici,persone,alberghi,sci,"servizi pubblici","mezzi di trasporto",istruzione,viabilità}
2264	{uomini,militari,persone,bambini,mestieri,"lavori maschili"}
2254	{"edifici religiosi","funzioni religiose",coscritti,uomini,militari,cavedago,edifici,persone,mestieri,"lavori maschili"}
3822	{"edifici religiosi","funzioni religiose",coscritti,uomini,militari,cavedago,edifici,persone,mestieri,"lavori maschili",viabilità}
4118	{"edifici religiosi","funzioni religiose",coscritti,uomini,militari,cavedago,edifici,persone,mestieri,"lavori maschili",viabilità}
2251	{"edifici religiosi","funzioni religiose",uomini,militari,edifici,alberghi,persone,mestieri,"lavori maschili"}
2845	{"giochi e sport",montagne,brescia,sci,"mezzi di trasporto",valle,mestieri,"lavori maschili"}
815	{"edifici religiosi",uomini,militari,riva,cavedago,religiosi,edifici,persone,istruzione,mestieri,"lavori maschili"}
3711	{"edifici religiosi",uomini,militari,riva,cavedago,religiosi,edifici,persone,istruzione,mestieri,"lavori maschili"}
2183	{"edifici religiosi","funzioni religiose",edifici,persone,bambini,istruzione,mestieri,"lavori maschili"}
294	{uomini,militari,cavedago,persone,mestieri,"lavori maschili"}
2448	{uomini,militari,persone,mestieri,"lavori maschili"}
1482	{"funzioni religiose",uomini,militari,persone,mestieri,"lavori maschili",viabilità}
2417	{uomini,militari,andalo,montagne,persone,toscana,mestieri,"lavori maschili"}
3315	{uomini,militari,boschi,edifici,persone,istruzione,mestieri,"lavori maschili"}
3789	{uomini,militari,boschi,edifici,persone,istruzione,mestieri,"lavori maschili"}
250	{"edifici religiosi","funzioni religiose",uomini,militari,feste,edifici,persone,mestieri,"lavori maschili"}
2786	{"edifici religiosi","funzioni religiose",coscritti,uomini,militari,cavedago,edifici,persone,mestieri,"lavori maschili"}
4104	{"edifici religiosi","funzioni religiose",coscritti,uomini,militari,cavedago,"giochi e sport",edifici,persone,mestieri,"lavori maschili"}
4106	{"edifici religiosi","funzioni religiose",coscritti,uomini,militari,cavedago,edifici,persone,mestieri,"lavori maschili"}
4103	{"edifici religiosi","funzioni religiose",coscritti,uomini,militari,cavedago,edifici,persone,mestieri,"lavori maschili"}
4105	{"edifici religiosi","funzioni religiose",coscritti,uomini,militari,cavedago,edifici,persone,"servizi pubblici",mestieri,"lavori maschili"}
2202	{"edifici religiosi","funzioni religiose",uomini,militari,cavedago,edifici,persone,emigrazione,mestieri,"lavori maschili"}
1717	{"edifici religiosi","funzioni religiose",uomini,fontane,militari,feste,edifici,persone,mestieri,"lavori maschili"}
476	{uomini,fai,militari,boschi,religiosi,persone,mestieri,"lavori maschili"}
2015	{"funzioni religiose",uomini,militari,persone,bambini,istruzione,mestieri,"lavori maschili"}
2016	{"funzioni religiose",uomini,militari,persone,bambini,istruzione,mestieri,"lavori maschili"}
2014	{"funzioni religiose",uomini,militari,persone,bambini,istruzione,mestieri,"lavori maschili"}
2182	{"edifici religiosi","funzioni religiose",edifici,persone,bambini,istruzione,mestieri,"lavori maschili"}
2474	{"funzioni religiose",feste,religiosi,persone}
3812	{spormaggiore,turismo,agricoltura,cavedago,edifici,alberghi,persone,agricoltura,alimentazione}
1512	{edifici,alberghi}
3193	{uomini,militari,turismo}
1001	{edifici,uomini,alberghi,militari}
373	{edifici,"edifici religiosi",spormaggiore}
1876	{edifici,"edifici religiosi","lavori maschili",viabilità,montagne}
1337	{edifici,persone,agricoltura,alimentazione,boschi,agricoltura,montagne}
2410	{montagne,edifici,alberghi,persone}
3851	{"edifici religiosi",edifici}
2995	{"giochi e sport",montagne,edifici,sci}
959	{andalo,"giochi e sport",paganella,montagne,sci,"mezzi di trasporto",istruzione,viabilità}
585	{"giochi e sport",montagne,edifici,persone,alberghi,sci,"servizi pubblici","mezzi di trasporto",istruzione,viabilità}
961	{andalo,"giochi e sport",paganella,montagne,edifici,sci,"mezzi di trasporto",istruzione,viabilità,"lavori maschili"}
800	{genova,uomini,militari,cavedago,mestieri,"lavori maschili"}
808	{uomini,militari,cavedago,mestieri,"lavori maschili"}
928	{uomini,militari,edifici,mestieri,"lavori maschili"}
2416	{uomini,militari,agricoltura,"giochi e sport",mestieri,"lavori maschili"}
3239	{agricoltura,alimentazione}
1643	{persone}
2703	{molveno}
4439	{persone}
4190	{persone}
2075	{persone}
4220	{donne}
262	{persone}
2903	{bambini}
3305	{persone}
1297	{molveno}
2706	{molveno}
3863	{persone}
4206	{persone}
3292	{feste}
1344	{bambini}
2295	{cavedago}
2338	{edifici}
258	{persone,donne}
4391	{bambini}
3444	{persone}
2651	{molveno}
3070	{edifici,persone}
938	{persone}
2192	{cavedago}
1004	{edifici}
2910	{persone}
4613	{boschi}
933	{persone}
4140	{uomini}
2613	{edifici}
823	{persone}
3815	{cavedago}
4473	{bambini}
3346	{persone}
455	{persone}
3025	{toscana}
4415	{persone}
1762	{persone}
1470	{edifici}
1014	{montagne}
918	{persone}
3887	{bambini}
3853	{persone}
3988	{cavedago}
1769	{persone}
4396	{persone}
2306	{cavedago}
4579	{persone}
3879	{bambini}
507	{edifici}
386	{edifici}
3330	{persone}
1067	{boschi}
1563	{edifici}
2870	{persone}
3139	{persone}
2885	{persone}
3275	{agricoltura}
3046	{persone}
2324	{persone}
1165	{molveno}
4351	{donne}
930	{persone}
4541	{persone}
3068	{persone}
4301	{persone,donne}
459	{persone}
3734	{cavedago}
3316	{bambini}
1064	{boschi}
1322	{molveno}
420	{persone}
1483	{persone}
3880	{bambini}
1907	{persone}
384	{persone}
3816	{persone}
4227	{persone}
3317	{persone}
4141	{uomini}
967	{persone}
2823	{persone}
857	{viabilità}
3319	{persone}
3835	{persone}
3309	{persone}
4350	{persone}
3088	{feste}
4191	{persone}
3302	{persone}
2304	{cavedago}
3393	{persone}
1521	{bambini}
4622	{persone}
1793	{agricoltura}
1775	{bambini}
2554	{molveno}
1691	{persone}
4547	{persone}
3934	{persone,trento,cavedago}
3976	{persone,cavedago,bambini}
4361	{persone,spormaggiore,feste}
3269	{trento}
2635	{viabilità}
3266	{persone}
3376	{persone}
2705	{molveno}
2997	{boschi}
3948	{uomini,cavedago}
431	{bambini}
1029	{persone}
947	{edifici}
1281	{persone}
1896	{bambini}
4527	{persone}
931	{persone}
4478	{persone}
4200	{persone}
268	{boschi}
2917	{persone}
3320	{bambini}
2923	{montagne}
4496	{persone}
3522	{turismo}
254	{persone}
4438	{persone}
378	{montagne}
3885	{donne}
3304	{persone}
1160	{molveno}
3157	{persone}
4291	{persone}
3497	{edifici,paganella}
1757	{persone}
4530	{persone}
2224	{boschi}
2031	{persone}
4558	{persone,agricoltura}
2605	{agricoltura,montagne}
3513	{turismo,paganella}
3107	{edifici}
2501	{"servizi pubblici"}
3947	{cavedago,donne}
4607	{persone}
3519	{turismo,paganella}
4462	{persone}
3166	{persone}
2043	{belfort,edifici}
3219	{persone,bambini}
228	{edifici,persone,cavedago}
2821	{cavedago}
3248	{feste,bambini}
505	{persone}
2147	{edifici}
2382	{persone}
2835	{cavedago}
2082	{spormaggiore,montagne}
1559	{belfort,edifici}
3225	{montagne}
3967	{persone,cavedago}
3115	{boschi}
337	{persone}
3118	{montagne}
1683	{persone}
4614	{spormaggiore,persone}
4300	{persone}
249	{emigrazione}
1995	{toscana}
3524	{turismo,paganella}
3003	{"funzioni religiose",persone}
3941	{persone,cavedago,bambini}
1445	{persone}
2629	{persone,cavedago}
2694	{viabilità}
1631	{edifici,montagne}
1807	{belfort,edifici}
1495	{edifici,persone}
1913	{persone}
3005	{"funzioni religiose",persone,toscana}
3886	{bambini,donne}
1166	{molveno,montagne}
2300	{persone,cavedago}
2574	{molveno,montagne}
16	{montagne}
463	{persone}
1564	{montagne,belfort,edifici}
4556	{spormaggiore}
1801	{persone}
4475	{persone}
4058	{edifici,persone}
1195	{persone,turismo}
1374	{persone,alimentazione,montagne}
1181	{edifici,molveno}
1315	{edifici,molveno}
3913	{persone,cavedago}
2442	{adige}
1491	{strumenti,agricoltura}
2643	{rifugi,edifici}
726	{uomini,militari,montagne,persone,alpinismo}
321	{religiosi,edifici,persone}
988	{boschi,"giochi e sport",montagne,sci,"mezzi di trasporto","lavori maschili"}
2103	{agricoltura,persone,alimentazione,mestieri,"lavori maschili",viabilità}
1033	{"edifici religiosi","funzioni religiose",uomini,spormaggiore,militari,trento,agricoltura,religiosi,edifici,strumenti,persone,alimentazione}
3434	{animali,edifici,allevamento}
428	{"edifici religiosi",edifici}
\.


--
-- Name: tags tags2_pkey1; Type: CONSTRAINT; Schema: public; Owner: andalo
--

ALTER TABLE ONLY public.tags
    ADD CONSTRAINT tags_pkey PRIMARY KEY (scheda);


--
-- Name: tags tags2_scheda_fkey1; Type: FK CONSTRAINT; Schema: public; Owner: andalo
--

ALTER TABLE ONLY public.tags
    ADD CONSTRAINT tags_scheda_fkey FOREIGN KEY (scheda) REFERENCES public.foto2(id_scheda) ON DELETE CASCADE;


--
-- PostgreSQL database dump complete
--
