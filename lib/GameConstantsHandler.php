<?php

/**
 * Created by PhpStorm.
 * User: Lukas
 * Date: 02.06.2016
 * Time: 08:31
 */
class GameConstantsHandler
{
    public function getRegionName($regionKey) {
        switch(strtolower($regionKey)) {
            case "euw":
                return "Europe West";
            case "eune":
                return "Europe Nordic & East";
            case "na":
                return "North America";
            case "lan":
                return "Latin America North";
            case "las":
                return "Latin America South";
            case "tr":
                return "Turkey";
            case "kr":
                return "Korea";
            case "br":
                return "Brazil";
            case "oce":
                return "Oceania";
            case "ru":
                return "Russia";
            default:
                return "Unknown Region!";
        }
    }
    public function getQueueTypeName($queueTypeKey) {
        switch($queueTypeKey) {
            case "CUSTOM":
                return "Custom game";
            case "NORMAL_3x3":
                return "Normal 3v3 Game";
            case "NORMAL_5x5_BLIND":
                return "Normal 5v5 Blind Pick";
            case "NORMAL_5x5_DRAFT":
                return "Normal 5v5 Draft Pick";
            case "RANKED_SOLO_5x5":
                return "Ranked Solo 5v5";
            case "BOT_5x5":
                return "Coop vs Bots 5v5";
            case "BOT_ODIN_5x5":
                return "Dominion Coop vs AI";
            case "BOT_5x5_INTRO":
                return "Summoner's Rift Coop vs AI Intro Bot";
            case "BOT_5x5_BEGINNER":
                return "Summoner's Rift Coop vs AI Beginner Bot";
            case "BOT_5x5_INTERMEDIATE":
                return "Historical Summoner's Rift Coop vs AI Intermediate Bot";
            case "BOT_TT_3x3":
                return "Twisted Treeline Coop vs AI";
            case "ARAM_5x5":
                return "ARAM 5v5";
            case "ONEFORALL_5x5":
                return "One for all 5v5";
            case "SR_6x6":
                return "Summoner's Rift 6x6 Hexakill";
            case "URF_5x5":
                return "Ultra Rapid Fire";
            case "BOT_URF_5x5":
                return "Ultra Rapid Fire vs Bots";
            case "ASCENSION_5x5":
                return "Ascension";
            case "HEXAKILL":
                return "Hexakill";
            case "BILGEWATER_ARAM_5x5":
                return "Bilgewater";
            case "KING_PORO_5x5":
                return "Poro King 5v5";
            case "COUNTER_PICK":
                return "Counter Pick";
            case "DEFINITELY_NOT_DOMINION_5x5":
                return "Definitely not Dominion";
            case "TEAM_BUILDER_DRAFT_UNRANKED_5x5":
                return "TeamBuilder 5v5 Normal";
            case "TEAM_BUILDER_DRAFT_RANKED_5x5":
                return "Summoner's Rift Dynamic Queue";
            default:
                return "Unknown Gamemode";
        }
    }
}