import {registerBlockType} from '@wordpress/blocks'
import {createElement} from '@wordpress/element'

const blockStyle = {
	backgroundColor: '#900',
	color: '#fff',
	padding: '20px',
}

const icon = createElement('svg', {viewBox: '0 0 512 512'},
	createElement('path', {d: 'M448 96v320h32a16 16 0 0 1 16 16v32a16 16 0 0 1-16 16H320a16 16 0 0 1-16-16v-32a16 16 0 0 1 16-16h32V288H160v128h32a16 16 0 0 1 16 16v32a16 16 0 0 1-16 16H32a16 16 0 0 1-16-16v-32a16 16 0 0 1 16-16h32V96H32a16 16 0 0 1-16-16V48a16 16 0 0 1 16-16h160a16 16 0 0 1 16 16v32a16 16 0 0 1-16 16h-32v128h192V96h-32a16 16 0 0 1-16-16V48a16 16 0 0 1 16-16h160a16 16 0 0 1 16 16v32a16 16 0 0 1-16 16z'})
)

registerBlockType('tpd/captioned-heading', {
  title: 'Captioned Heading',
  icon,
  category: 'layout',
  example: {},
 
  edit() {
    return <div style={ blockStyle }>Hello World, step 1 (from the editor).</div>;
  },
  save() {
    return <div style={ blockStyle }>Hello World, step 1 (from the frontend).</div>;
  },
});