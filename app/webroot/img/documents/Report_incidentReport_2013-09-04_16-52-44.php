 <?
 define(‘SPADES’,   3);
 define(‘DIAMONDS’, 2);
 define(‘HEARTS’,   1);
 define(‘CLUBS’,    0);

 define(‘ACE’,   14);
 define(‘KING’,  13);
 define(‘QUEEN’, 12);
 define(‘JACK’,  11);

 class Poker_Card
 {
     var $rank;
     var $suit;
     var $_rank_values = array(   2 => ‘Two’,
                              3 => ‘Three’,
                              4 => ‘Four’,
                              5 => ‘Five’,
                              6 => ‘Six’,
                              7 => ‘Seven’,
                              8 => ‘Eight’,
                              9 => ‘Nine’,
                             10 => ‘Ten’,
                             11 => ‘Jack’,
                             12 => ‘Queen’,
                             13 => ‘King’,
                             14 => ‘Ace’);
     var $_suit_values = array(  SPADES   => ‘Spades’,
                             DIAMONDS => ‘Diamonds’,
                             HEARTS   => ‘Hearts’,
                             CLUBS    => ‘Clubs’);

     function Poker_Card($rank, $suit) {
         $this->rank = $rank;
         $this->suit = $suit;
     }

     function getRank() {
         return $this->_rank_values[$this->rank];
     }

     function getSuit() {
         return $this->_suit_values[$this->suit];
     }
 }

 
 /*
 hand strength ranking
 assumptions:
     -single deck
     -no wildcards
     -suit does not work as a tie-breaker
 possible hands (total in parentheses):
 -note: the total is bases on how many different hands there are in terms of strength.
 Therefore, there is only one royal flush, since they all have the same power (remember:
 suit is not used as a tie-breaker

 1. Royal Flush (1)
 2. Straight Flush
   -high card [A-5] (9)
 3. Four of a kind
   -value of quads [A-2] (13)
 4. Full House
   -trips [A-2] (13)
   -twos [A-2, minus trips] (12) (13 x 12 = 156)
 5. Flush
   -all card values (13 x 12 x 11 x 10 x 9 = 154440)
 6. straight (aces either high or low)
   -top card [A-5] (9)
 7. Three of a kind
   -rank of trips (13)
   -2 kickers (if more than one deck) (12, 11) (13 x 12 x 11 = 1716)
 8. Two pair
   -high pair (13)
   -low pair (12)
   -kicker (11) (13 x 12 x 11 = 1716)
 9. Pair
   -rank of pair (13)
   -3 kickers (12, 11, 10) (13 x 12 x 11 x 10 = 17160)
 10. High Card
   - 5 kickers (13 x 12 x 11 x 10 x 9 = 154440)

 Sum:
    1 + 9 + 13 + 156 + 154440 + 9 + 13 + 1716 + 1716 + 17160 + 154440 = 329673

    So there are 329,673 different possible hands (in terms of strength) given the above
    assumptions.

 Representation:
    A 12-digit string will be used to represent the strength of the hand.
    Digits:
        1-2 Type of hand: (10 = royal flush…..01 = high card/no hand)
        3-4 The first of tie-breaker values
        (5-6)-(11-12) The rest of the tie-breaker values, as needed. Pad with zereos where not needed.

 http://www.math.sfu.ca/~alspach/comp18/
 http://hoho.com/mike/pypoker/poker.py
 */

 class Poker_Hand
 {

     var $_cards = array();
     var $_strength;
     var $_strength_desc;
     var $_rank_counts;
     var $_kickers;

     function pushCard($card) {
         return array_push($this->_cards, $card);
     }

     function _calculateStrength() {
         //sort the hand on descending rank
         $this->_sort();
         $strength_array = array_fill(0,6,0);
         $this->_countRanks();

         //test for royal flush
		 
		 //should be this ... $this->_sCards[0]->rank == ACE
         if ($this->_isFlush() and $this->_isStraight() and $this->_sCards[0].rank == ACE) {

             $this->_strength_desc = ‘Royal Flush’;
             $strength_array[0] = 9;

         } elseif ($this->_isFlush() and $this->_isStraight()) { //test for straight flush

             $this->_strength_desc = ‘Straight Flush, ‘ . $this->_sCards[0]->rank . ‘ high’;
             $strength_array[0] = 8;
             $strength_array[1] = $this->_sCards[0]->rank;

         } elseif ($quads_rank = $this->_hasQuads()) { //test for four of a kind

             $this->_strength_desc = ‘Four of a kind’;
             $strength_array[0] = 7;
             $strength_array[1] = $quads_rank;
             $strength_array[2] = $this->_kickers[0];

         } elseif (list($trips_rank, $pair_rank) = $this->_isFullHouse()) { //test for full house

             $this->_strength_desc = ‘Full House, ‘. $trips_rank . ‘ over ‘ . $pair_rank;
             $strength_array[0] = 6;
             $strength_array[1] = $trips_rank;
             $strength_array[2] = $pair_rank;

         } elseif ($this->_isFlush()) { //test for flush

             $this->_strength_desc = ‘Flush’;
             $strength_array[0] = 5;
             $strength_array[1] = $this->_kickers[0];
             $strength_array[2] = $this->_kickers[1];
             $strength_array[3] = $this->_kickers[2];
             $strength_array[4] = $this->_kickers[3];
             $strength_array[5] = $this->_kickers[4];

         } elseif ($this->_isStraight()) { //test for straight

             $this->_strength_desc = ‘Straight’;
             $strength_array[0] = 4;
             $strength_array[1] = $this->_sCards[0]->rank;

         } elseif ($trips_rank = $this->_hasTrips()) { //test for three of a kind

             $this->_strength_desc = ‘Three of a Kind.’;
             $strength_array[0] = 3;
             $strength_array[1] = $trips_rank;
             $strength_array[2] = $this->_kickers[0];
             $strength_array[3] = $this->_kickers[1];

         } elseif (list($high_pair, $low_pair) = $this->_hasTwoPair()) { //test for two pair

             $this->_strength_desc = ‘Two Pair’;
             $strength_array[0] = 2;
             $strength_array[1] = $high_pair;
             $strength_array [2] = $low_pair;
             $strength_array[3] = $this->_kickers[0];

         } elseif ($pair_rank = $this->_hasPair()) { //test for pair

             $this->_strength_desc = ‘One Pair’;
             $strength_array[0] = 1;
             $strength_array[1] = $pair_rank;
             $strength_array[2] = $this->_kickers[0];
             $strength_array[3] = $this->_kickers[1];
             $strength_array[4] = $this->_kickers[2];

         } else {

             $this->_strength_desc = $this->_sCards[0]->getRank().‘ high’;
             $strength_array[0] = 0;
             $strength_array[1] = $this->_kickers[0];
             $strength_array[2] = $this->_kickers[1];
             $strength_array[3] = $this->_kickers[2];
             $strength_array[4] = $this->_kickers[3];
             $strength_array[5] = $this->_kickers[4];
         }

         $this->_strength = vsprintf(‘%d%02d%02d%02d%02d%02d’, $strength_array);
     }

     function _isFullHouse()
     {
         if (array_search(3, $this->_rank_counts) and array_search(2, $this->_rank_counts)){
             return array(array_search(3, $this->_rank_counts), array_search(2, $this->_rank_counts));
         } else {
             return false;
         }
     }

     function _isFlush()
     {
         return (($this->_sCards[0]->suit == $this->_sCards[1]->suit) and
                 ($this->_sCards[1]->suit == $this->_sCards[2]->suit) and
                 ($this->_sCards[2]->suit == $this->_sCards[3]->suit) and
                 ($this->_sCards[3]->suit == $this->_sCards[4]->suit));
     }

     // Ace should be either high or low, but this only handles it if its high
     function _isStraight()
     {
         for($i = 0; $i < 4; $i++) {
             if
             (!(($this->_sCards[$i]->rank - 1) == ($this->_sCards[$i + 1]->rank))) {
                 return false;
             }
         }
         return true;
     }

     function _hasQuads()
     {
         return array_search(4, $this->_rank_counts);
     }

     function _hasTrips()
     {
         return array_search(3, $this->_rank_counts);
     }

     function _hasTwoPair()
     {
         $temp = array_count_values($this->_rank_counts);
         if (isset($temp[2]) and $temp[2] == 2){
             return array_keys(array_filter($this->_rank_counts, array($this, ‘_two’)));
         } else {
             return false;
         }
     }

     function _hasPair()
     {
         return array_search(2, $this->_rank_counts);
     }

     //simple bubble sort based on rank
     function _sort()
     {
         $this->_sCards = $this->_cards;

         for ($i=0; $i < 4 ; $i++) {
             for ($j=0; $j < 4-$i; $j++){
                 if ($this->_sCards[$j+1]->rank > $this->_sCards[$j]->rank) {  /* compare the two neighbors */
                     $temp = $this->_sCards[$j];         /* swap a[j] and a[j+1]      */
                     $this->_sCards[$j] = $this->_sCards[$j+1];
                     $this->_sCards[$j+1] = $temp;
                  }
             }
         }
     }

     function isSorted()
     {
         for ($i=0; $i < 4; $i++) {
             if ($this->_sCards[$i]->rank < $this->_sCards[$i + 1]->rank)
                 return false;
         }

         return true;
     }

     function _countRanks()
     {
         //$this->_rank_counts = array_fill(2,14,0);
         foreach ($this->_sCards as $value) {
             @$this->_rank_counts[$value->rank]++;
         }

         $this->_kickers = array_keys(array_filter($this->_rank_counts, array($this,‘_one’)));
     }

     function _one($v) {
         return $v === 1;
     }

     function _two($v) {
         return $v === 2;
     }
 }
 
 ?>