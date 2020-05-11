import {registerBlockType} from '@wordpress/blocks'
import {createElement} from '@wordpress/element'
import {withSelect} from '@wordpress/data'
import {PanelBody, RangeControl} from '@wordpress/components'
import {InspectorControls} from '@wordpress/editor'
import ServerSideRender from '@wordpress/server-side-render'
import ProjectTagSelector from './components/ProjectTagSelector'

const icon = createElement('svg', {viewBox: '0 0 512 512'},
	createElement('path', {d: 'M320 336c0 8.84-7.16 16-16 16h-96c-8.84 0-16-7.16-16-16v-48H0v144c0 25.6 22.4 48 48 48h416c25.6 0 48-22.4 48-48V288H320v48zm144-208h-80V80c0-25.6-22.4-48-48-48H176c-25.6 0-48 22.4-48 48v48H48c-25.6 0-48 22.4-48 48v80h512v-80c0-25.6-22.4-48-48-48zm-144 0H192V96h128v32z'})
)

registerBlockType('tpd/projects-grid', {
  title: 'Projects Grid',
  category: 'theme_blocks',
  icon,

  attributes: {
    excludedTags: {
      type: 'array',
      items: 'number',
      default: []
    },
    mustIncludeTags: {
      type: 'array',
      items: 'number',
      default: []
    },
    maxPosts: {
      type: 'number',
      default: -1
    }
  },
  
  /**
   * - Fetch list of tags
   */
  edit: withSelect(select => {
    return {tags: select('core').getEntityRecords('taxonomy', 'project_tag')}
  })(({tags, attributes, setAttributes}) => {
    // Genereate tag options for select
    let tagOpts = []
    if (tags) {
      tagOpts = tags.map(tag => ({
        label: tag.name,
        value: tag.id
      }))
    }

    const onExcludedTagsChange = excludedTags => {
      setAttributes({excludedTags})
    }
    const onMustIncludeTagsChange = mustIncludeTags => {
      setAttributes({mustIncludeTags})
    }
    const onPostCountChange = maxPosts => {
      setAttributes({maxPosts})
    }

    return (
      <>
        <InspectorControls>
          <PanelBody title="Tag Manager">
            <ProjectTagSelector attributes={attributes} tags={tagOpts} selectedTags={attributes.excludedTags} label="Exclude these tags:" onChange={onExcludedTagsChange} />
            <ProjectTagSelector attributes={attributes} tags={tagOpts} selectedTags={attributes.mustIncludeTags} label="Must include these tags:" onChange={onMustIncludeTagsChange} />
          </PanelBody>
          <PanelBody title="Post Count">
            <RangeControl label="Max posts" value={attributes.maxPosts} min={-1} max={15} onChange={onPostCountChange} />
          </PanelBody>
        </InspectorControls>
        <ServerSideRender block='tpd/projects-grid' attributes={attributes} />
      </>
    )
  })
})