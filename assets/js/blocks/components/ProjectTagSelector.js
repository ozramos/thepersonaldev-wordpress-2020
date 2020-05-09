import {Component} from '@wordpress/element'
import {InspectorControls} from '@wordpress/editor'
import {PanelBody, PanelRow, SelectControl, Spinner} from '@wordpress/components'
import apiFetch from '@wordpress/api-fetch'

// @see https://www.ibenic.com/create-gutenberg-block-displaying-post/
export default class ProjectGridTagSelector extends Component {
  /**
   * Generate
   */
  static getInitialState ({excludedTags, tags}) {
    return {
      tags,
      excludedTags
    }
  }
 
  /**
   * Set state
   */
  constructor () {
    super(...arguments)
    this.state = this.constructor.getInitialState(this.props.attributes)
    this.getTags()
  }

  /**
   * Fetch tags from the server
   */
  getTags () {
    apiFetch({path: '/wp/v2/project_tag'}).then(results => {
      let tags = results.map(result => ({
        label: result.name,
        value: result.id
      }))

      console.log(tags)
      // this.setState({tags})
    })
  }
  
  /**
   * Render the multiselect field
   */
  render () {
    let {excludedTags, tags} = this.props.attributes.excludedTags

    return (
      <InspectorControls>
        <PanelBody title="Tag Manager">
          {tags
            ? <PanelRow>
                <SelectControl multiple label="Excluded tags" value={excludedTags} options={tags} />
              </PanelRow>
    
            : <Spinner />
          }
        </PanelBody>
      </InspectorControls>
    )
  }
}