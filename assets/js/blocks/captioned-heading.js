import {registerBlockType} from '@wordpress/blocks'
import {createElement} from '@wordpress/element'
import {RichText} from '@wordpress/block-editor'

const icon = createElement('svg', {viewBox: '0 0 512 512'},
	createElement('path', {d: 'M448 96v320h32a16 16 0 0 1 16 16v32a16 16 0 0 1-16 16H320a16 16 0 0 1-16-16v-32a16 16 0 0 1 16-16h32V288H160v128h32a16 16 0 0 1 16 16v32a16 16 0 0 1-16 16H32a16 16 0 0 1-16-16v-32a16 16 0 0 1 16-16h32V96H32a16 16 0 0 1-16-16V48a16 16 0 0 1 16-16h160a16 16 0 0 1 16 16v32a16 16 0 0 1-16 16h-32v128h192V96h-32a16 16 0 0 1-16-16V48a16 16 0 0 1 16-16h160a16 16 0 0 1 16 16v32a16 16 0 0 1-16 16z'})
)

registerBlockType('tpd/captioned-heading', {
  title: 'Captioned Heading',
  category: 'theme_blocks',
  icon,

  attributes: {
    subtitle: {
      type: 'array',
      source: 'children',
      selector: 'p.tpd-captioned-heading-subtitle'
    },
    heading: {
      type: 'array',
      source: 'children',
      selector: 'h2.tpd-captioned-heading'
    },
    content: {
      type: 'array',
      source: 'children',
      selector: 'div.tpd-captioned-heading-content'
    }
  },
  
  edit: props => {
    const {
      className,
      attributes: {subtitle, heading, content},
      setAttributes
    } = props
    
    const onChangeHeading = val => {
      setAttributes({heading: val})
    }
    const onChangeSubtitle = val => {
      setAttributes({subtitle: val})
    }
    const onChangeContent = val => {
      setAttributes({content: val})
    }
    
    return (
      <div className={className}>
        <RichText
          tagName="p"
          className="tpd-captioned-heading-subtitle"
          placeholder="Subtitle text"
          label='Subtitle'
          onChange={onChangeSubtitle}
          value={subtitle}
        />
        <RichText
          tagName="h2"
          className="tpd-captioned-heading"
          placeholder="Heading text"
          label='Heading'
          onChange={onChangeHeading}
          value={heading}
        />
        <RichText
          tagName="div"
          className="tpd-captioned-heading-content"
          placeholder="Heading content"
          label='Heading'
          onChange={onChangeContent}
          value={content}
        />
      </div>
    )
  },

  save: props => {
    const {
      className,
      attributes: {subtitle, heading, content}
    } = props
    
    return (
      <div className={className}>
        <RichText.Content className='tpd-captioned-heading-subtitle' tagName='p' value={subtitle} />
        <RichText.Content className='tpd-captioned-heading' tagName='h2' value={heading} />
        <RichText.Content className='tpd-captioned-heading-content' tagName='div' value={content} />
      </div>
    )
  }
})