import {registerBlockType} from '@wordpress/blocks'
import {createElement} from '@wordpress/element'
import {withSelect} from '@wordpress/data'
import ServerSideRender from '@wordpress/server-side-render'

const icon = createElement('svg', {viewBox: '0 0 512 512'},
	createElement('path', {d: 'M320 336c0 8.84-7.16 16-16 16h-96c-8.84 0-16-7.16-16-16v-48H0v144c0 25.6 22.4 48 48 48h416c25.6 0 48-22.4 48-48V288H320v48zm144-208h-80V80c0-25.6-22.4-48-48-48H176c-25.6 0-48 22.4-48 48v48H48c-25.6 0-48 22.4-48 48v80h512v-80c0-25.6-22.4-48-48-48zm-144 0H192V96h128v32z'})
)

registerBlockType('tpd/projects-grid', {
  title: 'Projects Grid',
  category: 'theme_blocks',
  icon,

  edit: props => {
    return <ServerSideRender block='tpd/projects-grid' attributes={props.attributes} />
  }
})