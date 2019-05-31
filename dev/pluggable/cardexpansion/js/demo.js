'use strict';

/**
 * Demo.
 */
const demo = ( function( window, undefined ) {

  /**
   * Enum of CSS selectors.
   */
  const SELECTORS = {
    pattern: '.pattern',
    card: '.card',
    cardImage: '.card__image',
    cardClose: '.card__btn-close'
  };

  /**
   * Enum of CSS classes.
   */
  const CLASSES = {
    patternHidden: 'pattern--hidden',
    polygon: 'polygon',
    polygonHidden: 'polygon--hidden'
  };

  /**
   * Map of svg paths and points.
   */
  const polygonMap = {
    paths: null,
    points: null
  };

  /**
   * Container of Card instances.
   */
  const layout = {};

  /**
   * Initialise demo.
   */
  function init() {

    // For options see: https://github.com/qrohlf/Trianglify
    const pattern = Trianglify({
      width: window.innerWidth,
      height: window.innerHeight,
      cell_size: 90,
      variance: 1,
      stroke_width: 0.6,
      color_function: function( x, y ) {
        return '#de6551';
      }
    }).svg(); // Render as SVG.
    _mapPolygons( pattern );
    _bindCards();
  };

  /**
   * Store path elements, map coordinates and sizes.
   * @param {Element} pattern The SVG Element generated with Trianglify.
   * @private
   */
  function _mapPolygons( pattern ) {

    // Append SVG to pattern container.
    $( SELECTORS.pattern ).append( pattern );

    // Convert nodelist to array,
    // Used `.childNodes` because IE doesn't support `.children` on SVG.
    polygonMap.paths = [].slice.call( pattern.childNodes );

    polygonMap.points = [];

    polygonMap.paths.forEach( function( polygon ) {

      // Hide polygons by adding CSS classes to each svg path (used attrs because of IE).
      $( polygon ).attr( 'class', CLASSES.polygon + ' ' + CLASSES.polygonHidden );

      const rect = polygon.getBoundingClientRect();

      const point = {
        x: rect.left + rect.width / 2,
        y: rect.top + rect.height / 2
      };

      polygonMap.points.push( point );
    });

    // All polygons are hidden now, display the pattern container.
    $( SELECTORS.pattern ).removeClass( CLASSES.patternHidden );
  };

  /**
   * Bind Card elements.
   * @private
   */
  function _bindCards() {

    const elements = $( SELECTORS.card );

    $.each( elements, function( card, i ) {

      const instance = new Card( i, card );

      layout[i] = {
        card: instance
      };

      const cardImage = $( card ).find( SELECTORS.cardImage );
      const cardClose = $( card ).find( SELECTORS.cardClose );

      $( cardImage ).on( 'click', _playSequence.bind( this, true, i ) );
      $( cardClose ).on( 'click', _playSequence.bind( this, false, i ) );
    });
  };

  /**
   * Create a sequence for the open or close animation and play.
   * @param {boolean} isOpenClick Flag to detect when it's a click to open.
   * @param {number} id The id of the clicked card.
   * @param {Event} e The event object.
   * @private
   *
   */
  function _playSequence( isOpenClick, id, e ) {

    const card = layout[id].card;

    // Prevent when card already open and user click on image.
    if ( card.isOpen && isOpenClick ) {return;}

    // Create timeline for the whole sequence.
    const sequence = new TimelineLite({ paused: true });

    const tweenOtherCards = _showHideOtherCards( id );

    if ( ! card.isOpen ) {

      // Open sequence.

      sequence.add( tweenOtherCards );
      sequence.add( card.openCard( _onCardMove ), 0 );

    } else {

      // Close sequence.

      const closeCard = card.closeCard();
      const position = closeCard.duration() * 0.8; // 80% of close card tween.

      sequence.add( closeCard );
      sequence.add( tweenOtherCards, position );
    }

    sequence.play();
  };

  /**
   * Show/Hide all other cards.
   * @param {number} id The id of the clcked card to be avoided.
   * @private
   */
  function _showHideOtherCards( id ) {

    const TL = new TimelineLite;

    const selectedCard = layout[id].card;

    for ( let i in layout ) {

      const card = layout[i].card;

      // When called with `openCard`.
      if ( card.id !== id && ! selectedCard.isOpen ) {
        TL.add( card.hideCard(), 0 );
      }

      // When called with `closeCard`.
      if ( card.id !== id && selectedCard.isOpen ) {
        TL.add( card.showCard(), 0 );
      }
    }

    return TL;
  };

  /**
   * Callback to be executed on Tween update, whatever a polygon
   * falls into a circular area defined by the card width the path's
   * CSS class will change accordingly.
   * @param {Object} track The card sizes and position during the floating.
   * @private
   */
  function _onCardMove( track ) {

    const radius = track.width / 2;

    const center = {
      x: track.x,
      y: track.y
    };

    polygonMap.points.forEach( function( point, i ) {

      if ( _detectPointInCircle( point, radius, center ) ) {
        $( polygonMap.paths[i]).attr( 'class', CLASSES.polygon );
      } else {
        $( polygonMap.paths[i]).attr( 'class', CLASSES.polygon + ' ' + CLASSES.polygonHidden );
      }
    });
  }

  /**
   * Detect if a point is inside a circle area.
   * @private
   */
  function _detectPointInCircle( point, radius, center ) {

    const xp = point.x;
    const yp = point.y;

    const xc = center.x;
    const yc = center.y;

    const d = radius * radius;

    const isInside = Math.pow( xp - xc, 2 ) + Math.pow( yp - yc, 2 ) <= d;

    return isInside;
  };

  // Expose methods.
  return {
    init: init
  };

}( window ) );

// Kickstart Demo.
window.onload = demo.init;
